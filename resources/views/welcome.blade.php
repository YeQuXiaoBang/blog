<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>首页</title>
      <link rel="stylesheet" href="{{ URL::asset('layui/css/layui.css') }}">
      <style>
          .logo{
             float:left;
             margin-top: 14px;
             font-size: 24px;
            width: 90px;
          }
          .write-btn{
              float:right;
          } 
          .layui-nav{
              text-align: center
          }
          .layui-nav-item{
              margin-left:  30px;
           
          }
          #body{
              width: 960px;;
             margin:0 auto
                  
          }
          #carousel{
              height: 260px;
              margin-bottom: 32px;
          }
          #title{
              position:fixed; top:0; left:0; width:100%; z-index:2; 
          }
        
          .recommend-collection-div{
              float: left;
              margin-bottom: 20px; margin-right: 10px;
          }
          .search{
              
  
    color: #c8c8c8;
        width: 240px;
    outline: none;
          }
      </style>
      
    </head>
    <body >
        <div style="height: 60px"></div>
       <ul class="layui-nav layui-bg-green" lay-filter="" id="title">
           <div class="logo">
               <a href="" ><font style="font-size: 28px;font-family: cursive">简屋</font></a>
           </div>
           
        <li class="layui-nav-item "><a href="">发现</a></li>
        <li class="layui-nav-item layui-this"><a href="">关注</a></li>
        <li class="layui-nav-item"><a href="">直播</a></li>
        
        <li class="search layui-nav-item">
              <input type="text" name="q" id="q" value="" autocomplete="off" placeholder="搜索" class="search-input">
        </li>

        <div class="write-btn">
            <li class="layui-nav-item">
            <a href=""><img src="http://t.cn/RCzsdCq" class="layui-nav-img">我</a>
            <dl class="layui-nav-child">
              <dd><a href="javascript:;">修改信息</a></dd>
              <dd><a href="javascript:;">安全管理</a></dd>
              <dd><a href="javascript:;">退了</a></dd>
            </dl>
          </li>
            <button class="layui-btn layui-btn-radius layui-btn-warm" onclick='window.open("{{ url('/writer')}}")'><i class="layui-icon">&#xe62a;</i> 写文章</button>
        </div>
      </ul>
        


<div id="body">
    <!--  轮播图开始      -->
     <div class="layui-carousel" id="carousel">
            <div carousel-item>
              <div>条目1</div>
              <div>条目2</div>
              <div>条目3</div>
              <div>条目4</div>
              <div>条目5</div>
            </div>
        </div>
    <!--  轮播图结束      -->  
    
      
          <div class="layui-row">
            <div class="layui-col-md9" >
                  <!--  推荐内容开始      -->
                <div class="recommend-collection" >
                    <div class="recommend-collection-div">
                        <button class="layui-btn">PHP</button>
                    </div>
                     <div class="recommend-collection-div">
                        <button class="layui-btn">mysql</button>
                    </div>
                     <div class="recommend-collection-div">
                        <button class="layui-btn">社会热点</button>
                    </div>
                     <div class="recommend-collection-div">
                        <button class="layui-btn">随写</button>
                    </div>
                     <div class="recommend-collection-div">
                        <button class="layui-btn">杂谈</button>
                    </div>
                     <div class="recommend-collection-div">
                        <button class="layui-btn">历史</button>
                    </div>
                     <div class="recommend-collection-div">
                        <button class="layui-btn">人文</button>
                    </div>
                     <div class="recommend-collection-div">
                        <button class="layui-btn">摄影</button>
                    </div>
                    
                     <div class="recommend-collection-div">
                        <button class="layui-btn">摄影</button>
                    </div>
                     <div class="recommend-collection-div">
                        <button class="layui-btn">摄影</button>
                    </div>
                     <div class="recommend-collection-div">
                        <button class="layui-btn">摄影</button>
                    </div>
                     <div class="recommend-collection-div">
                        <button class="layui-btn">摄影</button>
                    </div>
                     <div class="recommend-collection-div">
                        <button class="layui-btn">摄影</button>
                    </div>
                     <div class="recommend-collection-div">
                        <button class="layui-btn">摄影</button>
                    </div>
                </div>
                 <hr>
                   <!--  推荐内容结束      -->
                   
                   <!--  主体内容 -->
                   <div class="content"  id="html" style="display: none">
                <div class="author">
                  <a class="avatar" target="_blank" href="/u/b99054f7972b">
                    <img src="//upload.jianshu.io/users/upload_avatars/2187090/499c236169e0.jpg?imageMogr2/auto-orient/strip|imageView2/1/w/64/h/64" alt="64">
            </a>      <div class="info">
                    <a class="nickname" target="_blank" href="/u/b99054f7972b">大道皮皮</a>
                    <span class="time" data-shared-at="2017-12-19T18:07:22+08:00">昨天 18:07</span>
                  </div>
                </div>
                <a class="title" target="_blank" href="/p/2deaca50218a">优秀的孩子千篇一律，幸福的孩子万里挑一│赫尔曼·黑塞《在轮下》</a>
                <p class="abstract">
                  在儿童的生理和心理发展过程中，成人始终像“一个拥有惊人力量的巨人站在边上，等待着猛扑过去并把它压垮”。      ——蒙台梭利《童年的秘密》 黑塞的诺贝尔奖作品《在轮下》所写...
                </p>
                <div class="meta">
                    <a class="collection-tag" target="_blank" href="/c/yD9GAd">读书</a>
                  <a target="_blank" href="/p/2deaca50218a">
                    <i class="iconfont ic-list-read"></i> 1851
            </a>        <a target="_blank" href="/p/2deaca50218a#comments">
                      <i class="iconfont ic-list-comments"></i> 38
            </a>      <span><i class="iconfont ic-list-like"></i> 125</span>
                </div>
                <hr>
                
                            <div class="author">
                  <a class="avatar" target="_blank" href="/u/b99054f7972b">
                    <img src="//upload.jianshu.io/users/upload_avatars/2187090/499c236169e0.jpg?imageMogr2/auto-orient/strip|imageView2/1/w/64/h/64" alt="64">
            </a>      <div class="info">
                    <a class="nickname" target="_blank" href="/u/b99054f7972b">大道皮皮</a>
                    <span class="time" data-shared-at="2017-12-19T18:07:22+08:00">昨天 18:07</span>
                  </div>
                </div>
                <a class="title" target="_blank" href="/p/2deaca50218a">优秀的孩子千篇一律，幸福的孩子万里挑一│赫尔曼·黑塞《在轮下》</a>
                <p class="abstract">
                  在儿童的生理和心理发展过程中，成人始终像“一个拥有惊人力量的巨人站在边上，等待着猛扑过去并把它压垮”。      ——蒙台梭利《童年的秘密》 黑塞的诺贝尔奖作品《在轮下》所写...
                </p>
                <div class="meta">
                    <a class="collection-tag" target="_blank" href="/c/yD9GAd">读书</a>
                  <a target="_blank" href="/p/2deaca50218a">
                    <i class="iconfont ic-list-read"></i> 1851
            </a>        <a target="_blank" href="/p/2deaca50218a#comments">
                      <i class="iconfont ic-list-comments"></i> 38
            </a>      <span><i class="iconfont ic-list-like"></i> 125</span>
                </div>
                <hr>
                
                
                            <div class="author">
                  <a class="avatar" target="_blank" href="/u/b99054f7972b">
                    <img src="//upload.jianshu.io/users/upload_avatars/2187090/499c236169e0.jpg?imageMogr2/auto-orient/strip|imageView2/1/w/64/h/64" alt="64">
            </a>      <div class="info">
                    <a class="nickname" target="_blank" href="/u/b99054f7972b">大道皮皮</a>
                    <span class="time" data-shared-at="2017-12-19T18:07:22+08:00">昨天 18:07</span>
                  </div>
                </div>
                <a class="title" target="_blank" href="/p/2deaca50218a">优秀的孩子千篇一律，幸福的孩子万里挑一│赫尔曼·黑塞《在轮下》</a>
                <p class="abstract">
                  在儿童的生理和心理发展过程中，成人始终像“一个拥有惊人力量的巨人站在边上，等待着猛扑过去并把它压垮”。      ——蒙台梭利《童年的秘密》 黑塞的诺贝尔奖作品《在轮下》所写...
                </p>
                <div class="meta">
                    <a class="collection-tag" target="_blank" href="/c/yD9GAd">读书</a>
                  <a target="_blank" href="/p/2deaca50218a">
                    <i class="iconfont ic-list-read"></i> 1851
            </a>        <a target="_blank" href="/p/2deaca50218a#comments">
                      <i class="iconfont ic-list-comments"></i> 38
            </a>      <span><i class="iconfont ic-list-like"></i> 125</span>
                </div>
                <hr>
                
                            <div class="author">
                  <a class="avatar" target="_blank" href="/u/b99054f7972b">
                    <img src="//upload.jianshu.io/users/upload_avatars/2187090/499c236169e0.jpg?imageMogr2/auto-orient/strip|imageView2/1/w/64/h/64" alt="64">
            </a>      <div class="info">
                    <a class="nickname" target="_blank" href="/u/b99054f7972b">大道皮皮</a>
                    <span class="time" data-shared-at="2017-12-19T18:07:22+08:00">昨天 18:07</span>
                  </div>
                </div>
                <a class="title" target="_blank" href="/p/2deaca50218a">优秀的孩子千篇一律，幸福的孩子万里挑一│赫尔曼·黑塞《在轮下》</a>
                <p class="abstract">
                  在儿童的生理和心理发展过程中，成人始终像“一个拥有惊人力量的巨人站在边上，等待着猛扑过去并把它压垮”。      ——蒙台梭利《童年的秘密》 黑塞的诺贝尔奖作品《在轮下》所写...
                </p>
                <div class="meta">
                    <a class="collection-tag" target="_blank" href="/c/yD9GAd">读书</a>
                  <a target="_blank" href="/p/2deaca50218a">
                    <i class="iconfont ic-list-read"></i> 1851
            </a>        <a target="_blank" href="/p/2deaca50218a#comments">
                      <i class="iconfont ic-list-comments"></i> 38
            </a>      <span><i class="iconfont ic-list-like"></i> 125</span>
                </div>
                <hr>
    
  </div>
            
    
    
    
    
    
                   
                   <!--  主体内容结束 -->
                   
            </div>
            <div class="layui-col-md3">
              你的内容 3/12
            </div>
          </div>
       
</div>
 



        
         <script type="text/javascript" src="{{ URL::asset('js/jquery.min.js') }}"></script>
        <script type="text/javascript" src="{{URL::asset('layui/layui.all.js')}}"></script>
        <script>
            layui.use('carousel', function(){
              var carousel = layui.carousel;
              //建造实例
              carousel.render({
                elem: '#carousel'
                ,width: '100%' //设置容器宽度
                ,arrow: 'always' //始终显示箭头
                //,anim: 'updown' //切换动画方式
              });
            });
    
                  $('#html').show(1500); 
    
           
            
            
    </script>
    </body>
</html>
