  <link rel="stylesheet" href="{{ URL::asset('layui/css/layui.css') }}">
<style>
    .ant{
        height: 100%;
        width: 16%;
        color: #f2f2f2;
        background-color: #2e2e2e;
          float: left;
       overflow:auto;
    }
    body{
        padding:0; margin:0
    }
    .antR{
         height: 100%;
          width: 84%;
      
          background-color:  rgba(0,0,0,.65);
          float: left;
    }
    .antRl{
            background-color: #3d3d3d;
            height: 100%;
            border-right: 1px solid #4d4d4d;
            box-sizing:border-box;
            width:30%;
             overflow-y: auto;
            float: left;
    }
     .antRr{
            overflow-y: auto;
            background-color: #3d3d3d;
            height: 100%;
            width:70%;
            float: left;
    }
    
    .goHome{
                padding: 20px 18px 15px ;
                text-align: center;  
    }
    
    .addClassP{
         height: 40px;
         text-align: center;
         line-height:40px;
         overflow:hidden;
         cursor: pointer;
         border-bottom:  1px solid #4d4d4d;
         margin-bottom: 10px;
    }
    
    .classLi{
         text-align: center;
    }

    .classLi input{
        background-color: #4d4d4d;
        border: none;
        height: 30px;
        width: 96%;  
    }

     #corpusdiv{
        background-color: #262626;
        border-left: 3px solid #ec7259;
        
    }
    .corpusdiv{
         line-height: 40px;
          text-align: left;
    }
    .corpusli {  
        padding: 0 15px;
        white-space:nowrap;
        text-overflow:ellipsis;
        -o-text-overflow:ellipsis;
        overflow: hidden;
        text-align: left;
    }
    .corpusdiv span{
        color: #b3b3b3;
        overflow: hidden;
    }
   .corpusdiv .corpusedit{
        display: none
    }
    #corpusdiv .corpusedit{
        display: block
    }
    .corpusdiv:hover   {background-color: #262626;}
</style>


<div class="ant">
    <div class="goHome">
        <button class="layui-btn layui-btn-radius layui-btn-warm">  <i class="layui-icon"></i>  回首页</button>
    </div>
    <div class="addClassP">
       <i class="layui-icon"></i> 添加文集
    </div>
    <div class="classLi">
        <div id="naddcorpus" style=" display: none">
       <input type='text' id="corpusTitle">
       <div class="layui-btn-container" style="margin: 5px; ">
            <button class="layui-btn layui-btn-sm layui-btn-radius layui-btn-normal addCorpusBtn" >保存</button>
            <button class="layui-btn layui-btn-sm layui-btn-radius layui-btn-primary cancel_naddcorpus">取消</button>
        </div>
        </div>
      <ul class="corpus" >
          <!-- v-bind:style="{'backgroundColor':todo.corpusColor}"  -->
          <div v-for="todo in todos"  class="corpusdiv"     v-on:click="corpusClick(todo)"       v-bind:id="todo.divId">
               <i class="layui-icon corpusedit " v-on:click="corpusEdit(todo)"    style=" float: right; margin-right: 14px;" ></i>
                    <li class="corpusli"  v-bind:title="todo.title">
                        <span>@{{todo.title}}</span>
                    </li>
          </div>
      
      </ul>
    
    </div>
    
</div>



<div class="antR">
    <div class="antRl">
        1
    </div>
    
    
    <div class="antRr">
        2
    </div>
    
</div>


<!--  弹出层  -->
<div id="corpusEdit"  style=" display: none">
  <form class="layui-form" action="" style="margin-top: 20px;">
    <div class="layui-form-item" >
      <label class="layui-form-label">文集标题</label>
      <div class="layui-input-inline" style="width: 70%;">
        <input type="text" value="" id="corpusTitleInput" name="title" required lay-verify="required" placeholder="请输入标题" autocomplete="off" class="layui-input">    
      </div>
    </div>
     <div class="layui-form-item">
          <div class="layui-input-block">
            <button class="layui-btn" lay-submit lay-filter="formCorpus"  >立即提交</button>
            <button type="reset" class="layui-btn layui-btn-primary">清空内容</button>
            <a class="layui-btn layui-btn-danger delcorpus">删除文集</a>
          </div>
    </div>
  </form>
</div>
<!--  弹出层e  -->
<script src="https://cdn.jsdelivr.net/npm/vue"></script>
<script src="https://cdn.bootcss.com/vue-resource/1.0.2/vue-resource.js"></script>
<script type="text/javascript" src="{{URL::asset('layui/layui.all.js')}}"></script>
<script type="text/javascript" src="{{ URL::asset('js/jquery.min.js') }}"></script>
<script>
     
        //点击添加文集
        $('.addClassP').click(function(){
            $('#naddcorpus').show(300); 
        })
        //取消添加文集
        $('.cancel_naddcorpus').click(function(){
            $('#naddcorpus').hide(500);
             $('#corpusTitle').val('');
        })
        //确定添加文集
        $('.addCorpusBtn').click(function(){
            layer.load(1,{time:2000}); 
            var corpusTitleValue = $('#corpusTitle').val();
            if(corpusTitleValue==''){
                 layer.closeAll('loading');
                layer.msg('请输入文集名称哦···');return false;
            }
            //基于JQ ajax 的添加
            $.ajax({
                url:'{{url("home/editwriter")}}',
                type:'post',
                dataType:'JSON',
                data:{
                    _token:'{{csrf_token()}}',//laravel post 必须带这个才可以提交
                    corpusTitle:corpusTitleValue,
                    parent_id:0
                    },
                success:function(data){
                 //   console.log(data);return false;
                    layer.closeAll('loading');
                    if(data.code == 200) {
                        corpus.$data.todos.forEach(function(value,index){
                        corpus.$delete(value,"divId");
                        })
                        data.data.divId = 'corpusdiv';
                       // corpus.$data.todos.unshift(data.data)
                        corpus.$data.todos.unshift(data.data)
                        $('#naddcorpus').hide(300);
                        $('#corpusTitle').val('');
                    }else{
                        layer.alert(data.msg);
                    }
                }
            }) 
        })
        //删除文集
        $('.delcorpus').click(function(){
                layer.confirm('确定删除吗？', {
                   offset: '25%',
                    btn: ['是的', '再想想'] //可以无限个按钮
                    ,
                  }, function(layerindex, layero){
                        corpus.$data.todos.forEach(function(value,index){
                            if(typeof value.divId != 'undefined'){
                                   $.ajax({
                                        url:'{{url("home/delwriter")}}',
                                        type:'post',
                                        dataType:'JSON',
                                        data:{
                                            _token:'{{csrf_token()}}',//laravel post 必须带这个才可以提交
                                            id:value.id,
                                            },
                                        success:function(data){
                                            layer.closeAll();$('#corpusEdit').hide();
                                            if(data.code == 200) {
                                          
                                                Vue.delete( corpus.$data.todos,index);
                                            }else{
                                                layer.alert(data.msg);
                                            }
                                        }
                                    })
                            }
                        })                 
                  }, function(index){
                    //按钮【按钮二】的回调
                });
        })
        
        //layer 提交修改  
        var form = layui.form;
          form.on('submit(formCorpus)', function(data){
              var title = data.field.title;
              var reditValue = new Object;
              var _index ;
              corpus.$data.todos.forEach(function(value,index){
                    if(typeof value.divId != 'undefined'){
                         reditValue.id = value.id;
                         _index = index;
                    }
              }) 
            reditValue._token = '{{csrf_token()}}';
            reditValue.title = title;
            $.ajax({
                 url:'{{url("home/editwriter")}}',
                 type:'post',
                 dataType:'JSON',
                 data:reditValue,
                 success:function(data){
                    if(data.code==200){
                        layer.closeAll();$('#corpusEdit').hide();
                        corpus.$data.todos[_index]['title'] = title;
                    }else{
                        layer.alert(data.msg);
                    }
                 }
             })
            return false;
          });
      
        
        
        
            var corpus = new Vue({
                el:'.corpus',
                data:{
                    todos:[],//声明数据
                },
                methods:{
                    //查找数据
                    showCorpus:function(){
                        var _this = this;
                        this.$http.get('{{url("home/writer")}}'+'?parent_id=0').then(function(res){
                            console.log(res.body);
                            res.body[0].divId = 'corpusdiv'
                            _this.todos = res.body;
                        })
                    },corpusClick:function(dataInfo){
                       $('#naddcorpus').hide(300);//这个时候如果是点击了添加文集  肯定是要关闭的
                       _this = this;
                       if(typeof dataInfo.divId != 'undefined' ){
                            return false;
                       }
                       this.todos.forEach(function(value,index){
                          _this.$delete(value,"divId");
                       })
                       dataInfo.divId = 'corpusdiv';
                    },//弹出修改文集  基于layer
                    corpusEdit:function(dataInfo){
                         $('#corpusTitleInput').val(dataInfo.title);
                           layer.open({
                                title:'修改文集',
                                anim: 1,
                                offset: '25%',
                                type: 1,
                                area: ['500px', '200px'],
                                content: $('#corpusEdit'), //这里content是一个DOM，注意：最好该元素要存放在body最外层，否则可能被其它的相对元素所影响
                                cancel:function(){
                                    $('#corpusEdit').hide();
                                }
                            });  
                    }
                }
                ,mounted:function(){
                    this.showCorpus();
                }  
            })
            
        corpus.$watch('todos', function (newValue, oldValue) {
           // newValue.forEach(function(value,index){
                    console.log(newValue)
          //  })
            
  
       })
            
</script>

