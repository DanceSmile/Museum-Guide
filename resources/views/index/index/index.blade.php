<!DOCTYPE html>
<html lang="zh-cn">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{asset('leaflet.css')}}" />
    <link rel="stylesheet" href="{{asset('aui/css/aui.2.0.css')}}" />
   
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
		}	
		.leaflet-top {
		  	top: 100px;
		}

		#top{
			position: absolute;
			top: 0px;
			width: 100%;
			height: 100px;
			border:1px solid red;
			z-index: 99999999;
		}
		#top .bar{
			height: 50px;


		}

    </style>
  </head>
  <body>
  	<div id="top">
  		<section class="aui-content-padded bar">
  		
  		
  		</section>
  		
  	</div>
  	<!-- 地图div -->
    <div id="map">	
    	
    </div>

    <script src="{{asset('leaflet.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/vue.js')}}"></script>
    <script type="text/javascript">
     		var imageUrl = "/upload/{{$project->map}}";
            var img = new Image();
            img.src = imageUrl;
        img.onload =function(){
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
               zoom:-1,
              //设置地图中心点
               center:[0,0],
                // 当你不想用户点击地图关闭消息弹出框时，请将其设置为false。
               closePopupOnClick:false
            });
            // 2.使用div自定义标记点
            var myIcon = L.divIcon({className: 'my-div-icon'});
            var marker = [];
            @foreach($data as $item)
                marker.push(
                    L.marker([{{$item->coordinate}}],{
                        title:"{{$item->id}}",
                        draggable:false,
                        icon: myIcon
                    }).on('click',function(){
                    	alert({{$item->id}})
                    })
               )
            @endforeach
            L.layerGroup(marker)
                .addTo(map);
            // 添加图片到地图
            L.imageOverlay(imageUrl,[[-(imgHeight/2),-(imgWidth/2)],[imgHeight/2,imgWidth/2]]).addTo(map);

        }
    </script>
  </body>
</html>