@extends("layouts.admin")



@section("section")
<style>
    .padder-lg {
    padding-left: 30px;
    padding-right: 30px;
}
.scrollable {
    overflow-x: hidden;
    overflow-y: auto;
}
.row-sm {
    margin-left: -10px;
    margin-right: -10px;
}
.row-sm > div {
    padding-left: 10px;
    padding-right: 10px;
}
.pos-rlt {
    position: relative;
}
.padder-v {
    padding-top: 15px;
    padding-bottom: 15px;
}
.item .opacity {
    background-color: rgba(0,0,0,0.75);
}

.item-overlay {
    display: none;
    position: absolute;
    top: 0;
    right: 0;
    bottom: 0;
    left: 0;
}
.r-2x {
    border-radius: 4px;
}
.r {
    border-radius: 2px 2px 2px 2px;
}
.bg-black {
    background-color: #232c32;
    color: #7d94a4;
}
   
.item .center {
    position: absolute;
    top: 50%;
    left: 0;
    right: 0;
}

.m-t-n {
    margin-top: -15px;
}
.text-ellipsis {
    display: block;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
}


.text-xs {
    font-size: 12px;
}
.text-muted {
    color: #939aa0;
}

.item-overlay.active, .item:hover .item-overlay {
    display: block;
}

.item .opacity {
    background-color: rgba(0,0,0,0.75);
}
.item-overlay {
    display: none;
    position: absolute;
    top: 0;
    right: 0;
    bottom: 0;
    left: 0;
}
.r-2x {
    border-radius: 4px;
}
.r {
    border-radius: 2px 2px 2px 2px;
}
.bg-black {
    background-color: #232c32;
    color: #7d94a4;
}

.img-full {
    width: 100%;
}
.r-2x {
    border-radius: 4px;
}
.r {
    border-radius: 2px 2px 2px 2px;
}

a {
    color: #545a5f;
    text-decoration: none;
}
a:hover {
    color: #545a5f;
    
    text-decoration: none;
}
.i-2x {
    font-size: 2em;
}
.fa:hover {

    color: #fff;
}

</style>
<div class="main-container" >
    <div class="container-fluid">
        <div class="page-breadcrumb">
            <div class="row">
                <div class="col-md-7">
                    <div class="page-breadcrumb-wrap">

                        <div class="page-breadcrumb-info">
                            <h2 class="breadcrumb-titles font"> 管理已绑定的展品 <small>面板</small></h2>
                            <ul class="list-page-breadcrumb">
                                <li><a href="#">Home</a>
                                </li>
                                <li><a href="#">展览管理</a>
                                </li>
                                <li class="active-page">展品管理</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="btn-group pull-right " style="margin-top:30px;">
                        <a  href='{{url('admin/exhibit/create')}}' type="button" class="btn btn-default font"><i class="ico-plus"></i>添加新的展览</a>
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
                            <div class="dt-col-header font">{{$project->pname}}</div>
                            <p class="font" style="margin-bottom: 20px;">
                                 这里将显示绑定到 <span class="btn btn-info btn-xs">{{$project->pname}}</span> 展览下的 <span class="btn btn-info btn-xs">所有展品列表</span>
                            </p>
                            <p>
                                <a href="{{route('admin.exhibit.addGoods',$project->id)}}" class="btn btn-success btn-sm" title="">绑定新的展品</a>
                                 <a href="{{route('admin.exhibit.index')}}" class="btn btn-primary btn-sm" title="">返回展览列表</a>
                               
                            </p>
                        </th>
                        
                    </tr>
                    <tr>
                        <th class="tc-center font">
                            #
                        </th>
                        <th class="tc-center font">
                            展品名称
                        </th>
                        <th class="tc-center font">
                            展品图片
                        </th>
                        <th class="tc-center font">
                            展品创建时间
                        </th>
                        <th class="tc-center font">
                            操作
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data as $key => $item)
                        <tr>
                            <td class="tc-center font">
                                {{$key+1}}
                            </td>
                            <td class="tc-center font">
                             {{$item->title}}
                            </td>
                            <td class="tc-center font">
                                  @if($pic = $item->resource()->where("type",1)->first())
                                    {{$pic->resource_name}}
                                 @else
                                    没有图片
                                 @endif 
                            </td>
                            <td class="tc-center font">
                                {{$item->created_at}}
                            </td>
                            <td class="tc-center fot">
                                <div class="btn-toolbar" role="toolbar">
                                    <div class="btn-group" role="group">
                                       
                                        <a href="{{route('admin.exhibit.actionRemoveGoods',[$project->id,$item->id])}}" class="btn btn-warning btn-sm ">移除绑定</a>
                                       
                                    </div>
                                </div>
                            </td>
                     @endforeach
                </tbody>
            </table>
        </div>
        <div class="dt-pagination">
            <nav>
            <ul class="pagination">
                <li>
                <a href="#" aria-label="Previous">
                <span aria-hidden="true">Prev</span>
                </a>
                </li>
                <li><a href="#">1</a>
                </li>
                <li><a href="#">2</a>
                </li>
                <li><a href="#">3</a>
                </li>
                <li><a href="#">4</a>
                </li>
                <li><a href="#">5</a>
                </li>
                <li>
                <a href="#" aria-label="Next">
                <span aria-hidden="true">Next</span>
                </a>
                </li>
            </ul>
            </nav>
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

       
    })

    </script>
    
@endsection
