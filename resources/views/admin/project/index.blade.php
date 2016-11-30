@extends("layouts.admin")



@section("section")
<div class="main-container" >
    <div class="container-fluid">
        <div class="page-breadcrumb">
            <div class="row">
                <div class="col-md-7">
                    <div class="page-breadcrumb-wrap">
                        <div class="page-breadcrumb-info">
                            <h2 class="breadcrumb-titles  font">展览管理 <small>面板</small></h2>
                            <ul class="list-page-breadcrumb">
                                <li><a href="#">Home</a>
                                </li>
                                <li class="active-page">展览列表</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="btn-group pull-right " style="margin-top:30px;">
                        <a  href='{{url('admin/exhibit/create')}}' type="button" class="btn btn-default font"><i class="ico-plus"></i> 创建新的展览 </a>
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
                            <div class="dt-col-header font">展览列表</div>
                            <p class="font">
                                在这里你将看到所有创建过的展览 .
                            </p>
                        </th>
                        
                    </tr>
                    <tr>
                        <th class="tc-center font">
                            #
                        </th>
                        <th class="tc-center font">
                            展览主题
                        </th>
                        <th class="tc-center font">
                            展览地图
                        </th>
                        
                        <th class="tc-center font">
                            点位数量
                        </th>

                        <th class="tc-center font">
                            展品数量
                        </th>
                        <th class="tc-center font">
                            创建时间
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
                                {{$item->pname}}
                            </td>
                            <td class="tc-center font">
                                <img src="/upload/{{$item->map}}" style="max-width: 60px">
                            </td>
                            <td class="tc-center font">
                                {{$item->poi()->count()}}
                            </td>
                            <td class="tc-center font">
                                {{$item->exhibit()->count()}}
                            </td>
                            <td class="tc-center font">
                                {{$item->created_at}}
                            </td>
                            <td class="tc-center fot">
                                <div class="btn-toolbar" role="toolbar">
                                    <div class="btn-group" role="group">
                                        <a href="{{route('admin.exhibit.edit',$item->id)}}" class="btn btn-success btn-sm ">编辑展览</a>
                                        <form   style="display: inline-block;" action="{{route('admin.exhibit.destroy',$item->id)}}" method="post" accept-charset="utf-8">
                                            {{ method_field('DELETE') }}
                                            {{csrf_field()}}
                                            <button type="submit" class="btn btn-danger btn-sm ">删除展览</button>
                                        </form>
                                       
                                        <a href="{{route('admin.exhibit.goods',$item->id)}}" class="btn btn-warning btn-sm ">管理展品</a>
                                        <a href="{{route('admin.poi.show',[$item->id])}}" class="btn btn-primary btn-sm ">管理点位</a>
                                       
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

        function del(){

             $.ajax({
              type: "DELETE",
              url: "test.js",
              dataType: "script"
            });

        }
       
    })

    </script>
    
@endsection
