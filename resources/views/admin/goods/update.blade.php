@extends("layouts.admin")



@section("section")



<div class="main-container">
			<div class="container-fluid">
				<div class="page-breadcrumb">
					<div class="row">
						<div class="col-md-7">
							<div class="page-breadcrumb-wrap">
								<div class="page-breadcrumb-info">
									<h2 class="breadcrumb-titles">Add New Good <small>Add New Good Form</small></h2>
									<ul class="list-page-breadcrumb">
										<li><a href="#">Home</a>
										</li>
										<li class="active-page"> Sign Up</li>
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
					<div class="col-md-12">
						<div class="box-widget widget-module no-border">
							<div class="widget-container">
								<div class=" widget-block">
									<div class="page-header">
										<h2>Form Heading</h2>
										<p>
											Please provide your name, email address (won't be published) and a comment
										</p>
									</div>
							<form id="SignUpForm"  class="form-horizontal" action="{{url('admin/editGood').'/'.$data->id}}" method="post" >
                                        {{csrf_field()}}
										<div class="form-group">
											<label class="col-lg-3 control-label font">展品名称</label>
											<div class="col-lg-4">
												<input type="text" class="form-control" name="title" placeholder="展品名称" value="{{$data->title}}"/>
											</div>
										</div>
                                        <div class="form-group">
											<label class="col-lg-3 control-label  font">展品图片</label>
											<div class="col-lg-4">
												<input type="text" class="form-control" name="pic" placeholder="展品图片" value="{{$pic->resource_name}}" />
											</div>
										</div>
                                        <div class="form-group">
											<label class="col-lg-3 control-label  font">展品音频</label>
											<div class="col-lg-4">
												<input type="text" class="form-control" name="music" placeholder="展品音频" value="{{$music->resource_name}}" />
											</div>
										</div>

                                        <div class="form-group">
											<label class="col-lg-3 control-label  font">展品介绍</label>
											<div class="col-lg-4">
												<input type="text" class="form-control" name="content" placeholder="展品介绍" value="{{$data->content}}" />
											</div>
										</div>

                                        <div class="page-header">
                                           
                                            <p>
                                                Please provide your name, email address (won't be published) and a comment
                                            </p>
                                        </div>
<!-------------------------------------------------------------------------------------------------------------------->
                                       
                                        <div class="form-group">
											<label class="col-lg-3 control-label  font">设备UUID</label>
											<div class="col-lg-4">
												<input type="text" class="form-control" name="uuid" placeholder="设备UUID" value="{{$device->uuid}}" />
											</div>
										</div>
                                        <div class="form-group">
											<label class="col-lg-3 control-label  font">设备Major</label>
											<div class="col-lg-4">
												<input type="text" class="form-control" name="major" placeholder="设备Major" value="{{$device->major}}" />
											</div>
										</div>
                                        <div class="form-group">
											<label class="col-lg-3 control-label  font">设备Minor</label>
											<div class="col-lg-4">
												<input type="text" class="form-control" name="minor" placeholder="设备Minor" value="{{$device->minor}}" />
											</div>
										</div>

                                         <div class="form-group">
											<label class="col-lg-3 control-label  font">触发距离</label>
											<div class="col-lg-4">
												<input type="text" class="form-control" name="distance" placeholder="触发距离" value="{{$device->distance}}" />
											</div>
										</div>

                                        <div class="form-group">
											<label class="col-lg-3 control-label  font">设备说明</label>
											<div class="col-lg-4">
												<input type="text" class="form-control"  name="descript" placeholder="设备说明"/>
											</div>
										</div>
                                        
                                        <div class="form-group">
											<div class="col-lg-4 col-lg-offset-3">
												<input type="submit" class="form-control btn btn-success "  value="确认添加"  />
											</div>
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

<script>
      
</script>

@endsection
