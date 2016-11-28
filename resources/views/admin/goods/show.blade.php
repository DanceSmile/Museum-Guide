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
</style>
<div class="main-container">
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
                        <a  href='{{url('admin/addGoods')}}' type="button" class="btn btn-default"><i class="ico-plus"></i> Add New Goods</a>
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
										<tr>
											<th class="tc-center">
												#
											</th>
											<th class="font tc-center">
												展品名称
											</th>
											<th class="font tc-center">
												展品图片
											</th>
											
											<th class="tc-center font">
												已绑定的展览
											</th>
											<th class="tc-center font">
												添加时间
											</th>
                                            <th class="tc-center font">
												最后更新时间
											</th>
											<th class="tc-center font">
												操作
											</th>
										</tr>
										</thead>
										<tbody>
                                        @foreach($data as $key => $value)
                                            <tr>
                                                <td class="tc-center font">
                                                    {{$key+1}}
                                                </td>
                                                <td class="tc-center font">
                                                    {{$value->title}}
                                                </td>
                                                <td class="tc-center font">
                                                    @if($pic = $value->resource()->where("type",1)->first())
                                                        {{$pic->resource_name}}
                                                    @else
                                                        没有图片
                                                    @endif
                                                </td>
                                                <td class="tc-center font">
                                                   @if($value->project_id)
                                                        {{$value->project->pname}}
                                                    @else
                                                        <span class="btn btn-danger btn-xs"> 未绑定展览</span>
                                                    @endif
                                                </td>
                                                <td class="tc-center font">
                                                   {{$value->created_at}}
                                                </td>
                                                <td class="tc-center font">
                                                    {{$value->updated_at}}
                                                </td>
                                                <td class="tc-center fot">
                                                    <div class="btn-toolbar" role="toolbar">
                                                        <div class="btn-group" role="group">
                                                            <a href="{{url('admin/updateGood')."/".$value->id}}" class="btn btn-primary btn-sm ">编辑</a>
                                                            <a href="{{url('admin/delGood')."/".$value->id}}" class="btn btn-warning btn-sm ">删除</a>
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


<!--

                <div class=" col-md-4">
                  <div class="item">
                    <div class="pos-rlt">
                      <div class="item-overlay opacity r r-2x bg-black">
                        <div class="center text-center m-t-n">
                          <a href="video-detail.html"><i class="fa fa-play-circle i-2x"></i></a>
                        </div>
                      </div>
                      <a href="video-detail.html"><img src="{{asset('images/m43.jpg')}}" alt="" class="r r-2x img-full"></a>
                    </div>
                    <div class="padder-v">
                      <a href="video-detail.html" class="text-ellipsis">Phasellus at ultricies nequ</a>
                      <a href="video-detail.html" class="text-ellipsis text-xs text-muted">Volutpat</a>
                    </div>
                  </div>
                </div>


                <div class=" col-md-4">
                  <div class="item">
                    <div class="pos-rlt">
                      <div class="item-overlay opacity r r-2x bg-black">
                        <div class="center text-center m-t-n">
                          <a href="video-detail.html"><i class="fa fa-play-circle i-2x"></i></a>
                        </div>
                      </div>
                      <a href="video-detail.html"><img src="{{asset('images/m43.jpg')}}" alt="" class="r r-2x img-full"></a>
                    </div>
                    <div class="padder-v">
                      <a href="video-detail.html" class="text-ellipsis">Phasellus at ultricies nequ</a>
                      <a href="video-detail.html" class="text-ellipsis text-xs text-muted">Volutpat</a>
                    </div>
                  </div>
                </div>



                <div class=" col-md-4">
                  <div class="item">
                    <div class="pos-rlt">
                      <div class="item-overlay opacity r r-2x bg-black">
                        <div class="center text-center m-t-n">
                          <a href="video-detail.html"><i class="fa fa-play-circle i-2x"></i></a>
                        </div>
                      </div>
                      <a href="video-detail.html"><img src="{{asset('images/m43.jpg')}}" alt="" class="r r-2x img-full"></a>
                    </div>
                    <div class="padder-v">
                      <a href="video-detail.html" class="text-ellipsis">Phasellus at ultricies nequ</a>
                      <a href="video-detail.html" class="text-ellipsis text-xs text-muted">Volutpat</a>
                    </div>
                  </div>
                </div>-->


               
                            
       
     </div>



    </div>
</div>




@endsection
