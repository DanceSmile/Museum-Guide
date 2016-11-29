@extends("layouts.admin")
@section("load")
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.0.2/dist/leaflet.css" />
 <script src="https://unpkg.com/leaflet@1.0.2/dist/leaflet.js"></script>
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
</style>
<div class="main-container" >
    <div class="container-fluid">
        <div class="page-breadcrumb">
            <div class="row">
                <div class="col-md-7">
                    <div class="page-breadcrumb-wrap">


                        <div class="page-breadcrumb-info">
                            <h2 class="breadcrumb-titles">Dashboard <small>Web Application Backend</small></h2>
                            <ul class="list-page-breadcrumb">
                                <li><a href="#">Home</a>
                                </li>
                                <li class="active-page"> Dashboard</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="btn-group pull-right " style="margin-top:30px;">
                        <a  href='{{url('admin/exhibit/create')}}' type="button" class="btn btn-default"><i class="ico-plus"></i> Add New Goods</a>
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
                            <p>
                                This is a example of a complex header table you can use this syle in any kind of table.
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

         // Leaflet on Mobile
           //    实例地图类
           var map = L.map('map',{
            //    修改坐标系
               crs : L.CRS.Simple,
            //    设置最大拖动边界
               maxBounds : [[-456.5,-443],[456.5,443]],
            //    设置缩放的最小值
               minZoom : -2,
            //    设置地图放大的最大值W
               maxZoom : 2,
            //    设置初始化的缩放值
               zoom:0.2,
               
            //设置地图中心点
               center:[0,0],
                // 当你不想用户点击地图关闭消息弹出框时，请将其设置为false。
               closePopupOnClick:false
            })
           // 获取图片的长宽
            var imageUrl = "{{asset('upload/'.$project->map)}}";
            var img = new Image();
            img.src = imageUrl;
            var imgWidth = img.width;
            var imgHeight = img.height;
            // 1.使用图片自定义icon标记图标
            // var myIcon = L.icon({
            //     iconUrl: 'my-icon.png',
            //     iconRetinaUrl: 'my-icon@2x.pngW',
            //     iconSize: [38, 95],W
            //     iconAnchor: [22, 94],
            //     popupAnchor: [-3, -76],
            //     shadowUrl: 'my-icon-shadow.png',
            //     shadowRetinaUrl: 'my-icon-shadow@2x.png',
            //     shadowSize: [68, 95],
            //     shadowAnchor: [22, 94]
            // });
            // 2.使用div自定义标记点
            var myIcon = L.divIcon({className: 'my-div-icon'});
             // you can set .my-div-icon styles in CSS
            //  L.marker([0, 0], {icon: myIcon}).addTo(map);
            
            // 添加标记点
            // var center  = L.marker([0, 0],{
            //     title:"",
            //     draggable:true
            // });
            
            // // 标记添加到地图
            // center.addTo(map);
            // // 拖动标记事件开始
            // center.on("dragstart",function(){
            //     console.log("鼠标拖动事件");
            // })
            // // 鼠标持续拖动事件
            // center.on('drag',function(){
            //     console.log("鼠标持续拖动事件");
            // })
            //  // 鼠标持续拖动事件结束
            // center.on( 'dragend',function(){
            //     console.log("鼠标持续拖动事件结束");
            // })
            // // 鼠标点击事 件开始
            // center.on('click',function(){
            //     console.log("鼠标点击事件");
            // })


            // 批量添加标记点
            // var marker1 = L.marker([20,20]);
            // var marker2 = L.marker([5,30]);
            // var marker3 = L.marker([40,40]);
            // var marker4 = L.marker([11,87]);
            // var marker5 = L.marker([60,12]);
            // var marker6 = L.marker([39,23]);
            // var marker7 = L.marker([56,45]);
            // var marker8 = L.marker([90,90]);
            // var marker9 = L.marker([100,100]);
            var marker = [];
            @foreach($poi as $item)
                marker.push(
                    L.marker([{{$item->coordinate}}],{
                        title:"{{$item->id}}",
                        draggable:true
                    })
               )
            @endforeach
            L.layerGroup(marker)
                .addTo(map);
            
            // 添加图片到地图
            L.imageOverlay(imageUrl,[[-456.5,-448],[456.5,443]]).addTo(map);
            // 地图显示此边界的值
            // map.fitBounds([[-456.5,-443],[456.5,443]])
            // 触发地图的点击事件
            map.on('click', function(e) {
                 // L.marker(e.latlng).addTo(map);
            });

            $(".add_poi_ajax").click(function(){

                var exhibit = $(this).attr("exhibit");
                var title = $(this).attr("title");


                add_poi_ajax(exhibit,title,$(this))
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

                        $(".leaflet-marker-pane").find("img[title='"+$data.id+"']").remove();
                    }
                })
            }





            // 异步添加点位
            function add_poi_ajax(exhibit_id,title,obj){

                $.ajax({
                    headers:{
                      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url:"{{route('admin.poi.store')}}",
                    type:"post",
                    data:{
                        project_id : "{{$project_id}}",
                        coordinate : "0,0",
                        exhibit_id : exhibit_id,
                    },
                    success:function($data){



                        obj.parent().find(".remove_poi_ajax").show();
                        obj.parent().find(".remove_poi_ajax").attr("poi_id",$data.id)
                        obj.parents("tr").find(".is_add").html("0,0")
                        obj.hide();

                        var center = L.marker([0, 0],{
                            title: $data.id,
                            draggable:true
                        });

                        console.log(center)
                        
                        // 标记添加到地图
                        center.addTo(map);
                        center.bindPopup(title).openPopup();
                        center.on("click",function(){
                            this.openPopup()
                        })
                        // 拖动标记事件开始
                     
                        center.on("dragend",function(e){
                            
                            console.log(this)
                            // update_poi_ajax(e.id,e.target._latlng);
                        })
                    }
                })
            }

           
    })

    </script>
    
@endsection
