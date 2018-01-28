<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;


class GetDataController extends Controller
{
    public function GetWriter(){

        $parent_id  = input::get('parent_id');
        $leve       = input::get('leve');
      
        if( $leve == 0 ){
             $data = DB::select('select * from bl_classify where parent_id=0 and is_hide=0 order by id desc');
             if(empty($data)){
                $id = DB::table('bl_classify')->insertGetId(['parent_id'=>0,'title'=>'随写','user_id'=>1]);
              //  $id = db::insert('insert into bl_classify ( title , parent_id ,user_id ) values (?,?,?)',['随写',0,1]);
                $data[0]['title']      = '随写';
                $data[0]['parent_id']  =  0;
                $data[0]['id']         =  $id;
             }  
        }else if(  $leve > 0  ) {
            $data = DB::select('select * from bl_classify where parent_id= :parent_id',['parent_id' => $parent_id]);
            if(empty($data)){
                $data[0]['title']      = '未命名标题';
                $data[0]['parent_id']  =  $parebt_id;
                db::insert('insert into bl_classify ( title , parent_id ) values (?,?)',['未命名标题',$parent_id]);
            } 
            
        }
        return response()->json($data);
    }
      
    public function EditWriter(){
        //t sleep(2);
        $corpusTitle =  Input::post('corpusTitle');
        $id =  Input::post('id');
        $parent_id =  Input::post('parent_id');
        $title = Input::post('title');
        
        //如果有id  则代表修改   没有就代表添加
        //存在id  则是修改
        if( !empty($id) ) {
            // 查询是否存在
            
            $empty_data = DB::select('select * from bl_classify where id = :id and user_id = :user_id',
                    ['id'=>$id,'user_id'=>1]
                    );
            if(empty($empty_data)){
                $msg['msg'] = '不存在的···';
                $msg['code']=400;
            }else{
                //查询有没有其他同名
                $is_data = DB::select('select * from bl_classify where id != :id and user_id = :user_id and title = :title',
                    ['id'=>$id,'user_id'=>1,'title'=>$title]
                    );
                if(!empty($is_data)){
                     $msg['msg'] = '已经存在此文集···';
                     $msg['code']=400;
                }else{
                    DB::update('update bl_classify set title = ? where id=?',
                            [$title,$id]);
                    $msg['msg'] = '修改成功···';
                    $msg['code']=200;
                }
                 return response()->json($msg);
            }
            
            return response()->json($id);
        } else {
            //查询数据库是否存在title
            $data = DB::select('select * from bl_classify where title =  :title  and user_id = :user_id and parent_id = :parent_id and is_hide = :is_hide',
                    ['title'=>$corpusTitle,'user_id'=>1,'parent_id'=>$parent_id,'is_hide'=>0]
                    );
            if(!empty($data)){
                $msg['code'] = 400;
                $msg['msg']  = '已经存在此文集标题啦';
            }else{
//                $add_id = db::insert(
//                        'insert into bl_classify (title,parent_id,user_id) values (?,?,?)',
//                        [$corpusTitle,$parent_id,1]
//                        );
              $id = DB::table('bl_classify')->insertGetId(['parent_id'=>$parent_id,'title'=>$corpusTitle,'user_id'=>1]);
                if($id>0){
                    $msg['code'] = 200;
                    $msg['msg']  = '添加成功';
                    $msg['data'] = array(
                        'title'=>$corpusTitle,
                        'parent_id'=>$parent_id,
                        'id'    =>$id
                    );
                }else {
                    $msg['code'] = 400;
                    $msg['msg']  = '添加失败';
                }
            }   
        }
          return response()->json($msg);
    }
    
    
    public function DelWriter(){
        $id = input::post('id');
        $data = db::select('select * from bl_classify where id= :id and user_id = :user_id',['id'=>$id,'user_id'=>1]);
        if(empty($data)){
            $msg['code'] = 400;
            $msg['msg']  = '数据丢失···';
        }else{
              $is_del = DB::table('bl_classify')
                   ->where('id', $id)
                   ->update(['is_hide' => 1]);
              if($is_del!==false){
                    $msg['code'] = 200;
                    $msg['msg']  = '删除成功';
              }else{
                   $msg['code'] = 400;
                   $msg['msg']  = '删除失败';
              }
        }
        return response()->json($msg);
        
    }
    
}