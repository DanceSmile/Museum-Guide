@extends("layouts.admin")
@section("load")
    <link rel="stylesheet" href="{{asset('leaflet.css')}}" />
    <script src="{{asset('leaflet.js')}}"></script>
@endsection
@section("section")
<style>
#map{
    height: 500px;
    width: 100%;
}
table{
    font-size: 14px;
}
.leaflet-shadow-pane{
    display: none;
}
</style>
<div class="main-container" >
    <div class="container-fluid">
        <div class="page-breadcrumb">
            <div class="row">
                <div class="col-md-7">
                    <div class="page-breadcrumb-wrap">


                        <div class="page-breadcrumb-info">
                            <h2 class="breadcrumb-titles"> 管理点位 <small>面板</small></h2>
                            <ul class="list-page-breadcrumb">
                                <li><a href="#">Home</a>
                                </li>
                                <li><a href="#">展览列表</a>
                                </li>
                                <li class="active-page"> 管理点位 </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="btn-group pull-right " style="margin-top:30px;">
                        <a  href='{{url('admin/exhibit/create')}}' type="button" class="btn btn-default font"><i class="ico-plus"></i> 添加新的展览 </a>
                    </div>
                </div>
            </div>
        </div>

      <div class="row">



<div class="widget-container">
    <div class="widget-block">
        <div class="table-responsive">
            <table class="table table-striped table-hover table-bordered matmix-dt">
                <thead>
                    <tr>
                        <th colspan="7">
                            <div class="dt-col-header font">管理地图点位</div>
                            <p class="font">
                                在这里可以修改和删除当前已经添加的展品点位
                            </p>
                        </th>
                    </tr>
                </thead>
            </table>
        </div>
        <div class="row" id="poi">
            <div class="col-md-6">
                <table class="table table-striped table-hover table-bordered matmix-dt">
                     <thead>
                        <tr>
                            <th class="tc-center font">
                                名称
                            </th>
                            <th class="tc-center font">
                                坐标
                            </th>
                            <th class="tc-center font">
                                操作 
                            </th>
                        </tr>
                     </thead>
                     <tbody >
                            @foreach($data as $item)
                                <tr>
                                    <td class="tc-center font">
                                        {{$item->title}}
                                    </td>
                                    <td class="tc-center font is_add">
                                        @if($item->poi)
                                           {{$item->poi->coordinate}}
                                        @else
                                            <span class="btn btn-info btn-xs">未添加</span>
                                        @endif 
                                    </td>
                                    <td class="tc-center font action">
                                        @if(!$item->poi)
                                           <button  class="btn btn-success btn-sm add_poi_ajax" exhibit="{{$item->id}}" title="{{$item->title}}"  >添加点</a>
                                           <button  class="btn btn-danger btn-sm remove_poi_ajax" poi_id = ""   style="display: none">删除点</button>
                                        @else
                                           <button  class="btn btn-success btn-sm add_poi_ajax" exhibit="{{$item->id}}" style="display: none;" title="{{$item->title}}"  >添加点</a>
                                           <button  class="btn btn-danger btn-sm remove_poi_ajax" poi_id = "{{$item->poi->id}}"   >删除点</button>
                                        @endif 
                                         <!-- <button  class="btn btn-info btn-sm"  title="{{$item->title}}">标记点</a> -->
                                        
                                    </td>
                                </tr>
                            @endforeach
                    </tbody>
                </table>
            </div>
            <div class="col-md-6">

                <div id="map">
                    
                </div>
                
            </div>
        </div>



    </div>
</div>

              
     </div>



    </div>
</div>




@endsection


@section("js")

    <script>
        
    $(function(){
         localStorage.clear();

        var imageUrl = "{{asset('upload/'.$project->map)}}";
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
            })
          
        
            var marker = [];
            @foreach($poi as $item)
                marker.push(
                    L.marker([{{$item->coordinate}}],{
                        title:"{{$item->id}}",
                        draggable:false
                    }).bindPopup('{{$item->exhibit->title}}')
               )
            @endforeach
            L.layerGroup(marker)
                .addTo(map);
            
            // 添加图片到地图
            L.imageOverlay(imageUrl,[[-(imgHeight/2),-(imgWidth/2)],[imgHeight/2,imgWidth/2]]).addTo(map);
            // 地图显示此边界的值
            // map.fitBounds([[-456.5,-443],[456.5,443]])
            // 触发地图的点击事件
            map.on('click', function(e) {
                 if(localStorage.getItem("json")){


                     var data = JSON.parse(localStorage.getItem("json"));


                     add_poi_ajax(data.exhibit,data.title,currentObj,e.latlng.lat+","+e.latlng.lng)
                     localStorage.clear();





                 }

            });

            $(".add_poi_ajax").click(function(){



                var exhibit = $(this).attr("exhibit");
                var title = $(this).attr("title");
                var json = {
                    "exhibit" :exhibit,
                    "title" : title,
                };


                currentObj = $(this);

                 localStorage.setItem("json",JSON.stringify(json));



                // add_poi_ajax(exhibit,title,$(this))
            })


            $(document).on("click",".remove_poi_ajax",function(){

                var poi_id  = $(this).attr("poi_id")
                remove_poi_ajax(poi_id,$(this))

            })

         


             // 异步添加点位
            function update_poi_ajax(poi_id,coordinate){

                $.ajax({
                    headers:{
                      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url:"{{url('admin/poi')}}"+"/"+poi_id,
                    type:"put",
                    data:{
                        coordinate : coordinate,
                    },
                    success:function($data){
                        alert($data)
                    }
                })
            }

            // 异步删除点位
            function remove_poi_ajax(poi_id,obj){
                $.ajax({
                    headers:{
                      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url:'{{url('admin/poi')}}'+'/'+ poi_id ,
                    type:"delete",
                    data:{
                    },
                    success:function($data){
                        obj.parent().find(".add_poi_ajax").show();
                        obj.parents("tr").find(".is_add").html("<span class=\'btn btn-info btn-xs\'>未添加</span>")
                        obj.hide();
                        // $("#map").closePopup();
                        $(".leaflet-marker-pane").find("img[title='"+$data.id+"']").remove();
                    }
                })
            }





            // 异步添加点位
            function add_poi_ajax(exhibit_id,title,obj,coordinate){

                $.ajax({
                    headers:{
                      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url:"{{route('admin.poi.store')}}",
                    type:"post",
                    data:{
                        project_id : "{{$project_id}}",
                        coordinate : coordinate,
                        exhibit_id : exhibit_id,
                    },
                    success:function($data){



                        obj.parent().find(".remove_poi_ajax").show();
                        obj.parent().find(".remove_poi_ajax").attr("poi_id",$data.id)
                        obj.parents("tr").find(".is_add").html(coordinate)
                        obj.hide();

                        var center = L.marker(coordinate.split(","),{
                            title: $data.id,
                            draggable:false
                        });

                        
                        // 标记添加到地图
                        center.addTo(map);
                        center.bindPopup(title).openPopup();
                       
                        // 拖动标记事件开始
                     
                        center.on("dragend",function(e){
                            
                            console.log(this)
                            // update_poi_ajax(e.id,e.target._latlng);
                        })
                    }
                })
            }
        }      
    })



    </script>
    
@endsection
