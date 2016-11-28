@extends("layouts.admin")
 <link rel="stylesheet" href="https://unpkg.com/leaflet@1.0.2/dist/leaflet.css" />
 <script src="https://unpkg.com/leaflet@1.0.2/dist/leaflet.js"></script>
@section("section")
<style>
#map{
    height: 500px;
    width: 100%;
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
                            <div class="dt-col-header">All new registered users.</div>
                            <p>
                                This is a example of a complex header table you can use this syle in any kind of table.
                            </p>
                        </th>
                    </tr>
                </thead>
            </table>
        </div>
        <div class="row">
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
                                    <td class="tc-center font">
                                        @if($item->poi)
                                           {{$item->poi()->coordinate}}
                                        @else
                                            未添加
                                        @endif 
                                    </td>
                                    <td class="tc-center font">
                                         <button href="" class="btn btn-success btn-sm" title="">add</a>
                                         <button href="" class="btn btn-info btn-sm" title="">edit</a>
                                         <button href="" class="btn btn-danger btn-sm" title="">remove</a>
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
            })
           // 获取图片的长宽
            var imageUrl = '{{asset('images/map.jpg')}}';
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
            var center  = L.marker([0, 0],{
                title:"",
                draggable:true
            });
            
            // 标记添加到地图
            center.addTo(map);
            // 拖动标记事件开始
            center.on("dragstart",function(){
                console.log("鼠标拖动事件");
                
            })
            // 批量添加标记点
            var marker1 = L.marker([20,20]);
            var marker2 = L.marker([5,30]);
            var marker3 = L.marker([40,40]);
            var marker4 = L.marker([11,87]);
            var marker5 = L.marker([60,12]);
            var marker6 = L.marker([39,23]);
            var marker7 = L.marker([56,45]);
            var marker8 = L.marker([90,90]);
            var marker9 = L.marker([100,100]);
            
            var  marker = [];
            L.layerGroup([marker1, marker2,marker3, marker4,marker5, marker6,marker7, marker8,marker9])
               
                .addTo(map);
            // 鼠标持续拖动事件
            center.on('drag',function(){
                console.log("鼠标持续拖动事件");
            })
             // 鼠标持续拖动事件结束
            center.on('dragend',function(){
                console.log("鼠标持续拖动事件结束");
            })
            // 鼠标点击事件开始
            center.on('click',function(){
                console.log("鼠标点击事件");
            })
            // 添加图片到地图
            L.imageOverlay(imageUrl,[[-456.5,-448],[456.5,443]]).addTo(map);
            // 地图显示此边界的值
            // map.fitBounds([[-456.5,-443],[456.5,443]])
            // 触发地图的点击事件
            map.on('click', function(e) {
                 L.marker(e.latlng).addTo(map);
            });
       
    })

    </script>
    
@endsection
