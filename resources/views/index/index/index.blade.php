<!DOCTYPE html>
<html lang="zh-cn">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{asset('leaflet.css')}}" />
    <title>地图</title>
    <style type="text/css">
    	*{
    		margin:0px;
    		padding:0px;
    	}
    	.leaflet-control-attribution {
    		display: none;
    	}
    	html, body, #map {
		    height: 100vh;
		    width: 100vw;
		}
		.my-div-icon {
			width: 30px !important;
			height: 37px !important;
			background: url('{{asset('images/map_point.png')}}') no-repeat center center;
			background-size: 100% 100%;
      margin-left: -15px !important;
      margin-top: -34px !important;
		}	

    .pass-div-icon {
      width: 30px !important;
      height: 37px !important;
      background: url('{{asset('images/map_point_pass.png')}}') no-repeat center center;
      background-size: 100% 100%;
      margin-left: -15px !important;
      margin-top: -34px !important;
    }

		.leaflet-top {
		  	top: 150px;
		}

		#top{
			position: absolute;
			width: 100%;
      overflow: hidden;
			z-index: 99999999;
      background: rgba(255,255,255,0.95);
      transition: all 1s;

		}
		#top .row{
			 padding: 0px 10px;
       display: flex;
       display: box;
       display: -webkit-flex;
       justify-content: center;
		} 
    #top .row .rotate{
      flex:3;
      display: flex;
      display: box;
      display: -webkit-flex;
      justify-content: center;
      align-items: center ;
    }
    #top .row .rotate img{
       width: 0.188rem;
       height: 0.188rem;
       border-radius: 50%;
   
    }
    .ro{
      animation:mymove 5s infinite;
      -moz-animation:mymove 5s infinite; /* Firefox */
      -webkit-animation:mymove 5s infinite;  Safari and Chrome 
      -o-animation:mymove 5s infinite; /* Opera */
      animation-timing-function: linear;
      -webkit-animation-timing-function: linear;
    }

    #top .row .music{
      flex:8;
      display: flex;
      display: -webkit-flex;
      display: box;
      flex-direction: column;
      overflow: hidden;

    }
    #top .row .music .title{
       font-size: 0.04rem;
       font-weight: 600;
       text-align: center;
       flex-basis:40px;
       line-height: 40px;
       text-overflow: ellipsis;
       white-space: nowrap;
       overflow: hidden;

    }
    #top .row .music .main{
      display: flex;
      display: -webkit-flex;
      display: box;
    }

    #top .row .music .main .descript{
         flex: 1;
         display: flex;
         display: -webkit-flex;
         display: box;
         align-items: center;
         justify-content: space-around;
         padding:0px 5px;
         font-size: 0.05rem;
         color: #353535;
         line-height: 0.117rem;
    }
    #top .row .music .main .descript img{
         width: 0.125rem;
         height: 0.125rem;
    }
    #top .row .music .main .listen{
        flex: 1;
        display: flex;
        display: -webkit-flex;
        display: box;
        align-items: center;
        justify-content: space-around;
        padding:0px 5px;
        font-size: 18px;
        font-size: 0.05rem;
        color: #353535;
        line-height: 0.117rem;
    }
    #top .row .music .main .listen img{
         width: 0.125rem;
         height: 0.125rem;
    }
    @-webkit-keyframes mymove 
    {
    0%   { transform: rotate(0deg);}
    100% { transform: rotate(360deg);}
    }
    @-webkit-keyframes shake 
    {
       0%   { margin-top: 0px;}
       100% {margin-top: 0px;}
    }

    .pause{
      animation-play-state:paused;
    }
    </style>
  </head>
  <body >
  	<div id="top" v-bind:style="{top:-topHeight+'px'}"> 
      <div class="row">
        <div :class="{rotate:true,ro:true,pause:!transform}" >
             <img v-bind:src="rotate"   alt="">
        </div>
        <div class="music">
            <div class="title">
                @{{ title }}
            </div>
            <div class="main">
              <div class="descript">
                 <img src="{{asset('images/map_detail.png')}}" alt="">
                 详情
              </div>
              <div class="listen">
                 <img  @click="music"   v-bind:src="listen?'{{asset('images/map_on.png')}}':'{{asset('images/map_off.png')}}'" alt="">
                 语音
              </div>  
            </div>
        </div>
      </div>
  	</div>
  	<!-- 地图div -->
    <div id="map">	
    	
    </div>

    <script src="{{asset('leaflet.js')}}"></script>
    <script src="{{asset('js/fetch.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/vue.js')}}"></script>
    <script type="text/javascript">

        var resource_url = "http://7xssqi.com1.z0.glb.clouddn.com/";
     		var imageUrl = "/upload/{{$project->map}}";
        var img = new Image();
        var music_obj  = new Audio();
        var windowsWidth = document.documentElement.clientWidth;
        document.querySelector("html").setAttribute("style","font-size:"+windowsWidth+"px");
        if(localStorage.getItem("resource")){
            var localStorageData = JSON.parse(localStorage.getItem("resource"));
            music_obj.src = localStorageData.music;
            img.src =  localStorageData.pic;
        }
        img.src = imageUrl;
        img.onload = function(){

            	imgWidth = img.width;
           		imgHeight = img.height;
    	   // Leaflet on Mobile
           //    实例地图类
           var map = L.map('map',{
            //    修改坐标系
               crs : L.CRS.Simple,
            //    设置最大拖动边界
               maxBounds : [[-(imgHeight/2),-(imgWidth/2)],[imgHeight/2,imgWidth/2]],
            //    设置缩放的最小值
               minZoom : -2,
            //    设置地图放大的最大值W
               maxZoom : 2,
            //    设置初始化的缩放值
               zoom:0,
              //设置地图中心点
               center:[0,0],
                // 当你不想用户点击地图关闭消息弹出框时，请将其设置为false。
               closePopupOnClick:false
            });
            // 2.使用div自定义标记点
            var myIcon = L.divIcon({className: 'my-div-icon'});
            var passIcon = L.divIcon({className: 'pass-div-icon'});
            var marker = [];
            @foreach($data as $item)
                marker.push(
                    L.marker([{{$item->coordinate}}],{
                        title:"{{$item->exhibit->id}}",
                        draggable:false,
                        icon: myIcon
                    }).on('click',function(){
                      var self = this;
                      self.setIcon(passIcon);
                      var data = {exhibit:'{{$item->exhibit->id}}'};
                      resource = JSON.parse(localStorage.getItem("resource"));
                      if( resource && resource.exhibit == data.exhibit ){
                           music_obj.play();
                           app.topHeight = 0;
                           app.listen = 1;
                           app.transform = 1;
                           return ;
                      }
                      fetch('/api/info',{
                        method: "POST",
                        body: JSON.stringify(data),
                        headers: {
                          "Content-Type": "application/json",
                        }
                      }).then(function(response) {
                        return response.text()
                      }).then(function(body) {

                         music_obj.src = resource_url+JSON.parse(body)[1].resource_name;
                         app.rotate = resource_url+JSON.parse(body)[0].resource_name;
                         resource = {
                          "exhibit":JSON.parse(body)[1].exhibit_id,'music':resource_url+JSON.parse(body)[1].resource_name,"pic":resource_url+JSON.parse(body)[0].resource_name,title:JSON.parse(body)['title']};
                         localStorage.setItem("resource",JSON.stringify(resource));
                         console.log(resource.title)
                         app.title = resource.title ; 
                         console.log(app.title)
                         music_obj.play();
                      })
                      app.topHeight = 0;
                      app.listen = 1;
                      app.transform = 1;

                    })
               )
            @endforeach
            L.layerGroup(marker)
                .addTo(map);
            // 添加图片到地图
            L.imageOverlay(imageUrl,[[-(imgHeight/2),-(imgWidth/2)],[imgHeight/2,imgWidth/2]]).addTo(map);
            map.on("click",function(){
                app.topHeight = app.copyHeight;
            })
        }
        var app = new Vue({
            el:"#top",
            data:{
              topHeight:"",
              copyHeight:"",
              top:0,
              listen:0,
              transform:true,
              title:"",
              rotate:"http://zhongqi.wxfe.youban.aprbrother.com/material/icon/e4d9922ede9774b3a6e29339ce7c0f66.jpg"
            },
            methods:{
              music:function(){
                 this.listen = !this.listen;
                 this.transform = this.listen;
                 if(this.listen){
                    music_obj.play();
                 }else{
                    music_obj.pause();
                 }
              }
            },
            computed:{
               
            },
            mounted:function(){
                this.topHeight = document.querySelector(".row").offsetHeight;
                this.copyHeight = document.querySelector(".row").offsetHeight;
            }
        });

         if(localStorage.getItem("resource") == undefined){
             app.title = '';
          }else{
             app.title = JSON.parse(localStorage.getItem("resource")).title ;
         }

    </script>
  </body>
</html>