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
									<form id="SignUpForm"  class="form-horizontal" action="{{route('admin.exhibit.update',$data->id)}}" method="post" >
                                        {{csrf_field()}}
										{{ method_field('PUT') }}
                                        
										<div class="form-group">
											<label class="col-lg-3 control-label font">展览主题</label>
											<div class="col-lg-4">
												<input type="text" class="form-control" name="pname" placeholder="展览主题" value="{{$data->pname}}"/>
											</div>
										</div>
										<div class="form-group">
											<label class="col-lg-3 control-label font">展览地图</label>
											<div class="col-lg-4">	
												<input type="text" class="form-control" name="map" placeholder="展览地图" value="{{$data->map}}"/>
											</div>
										</div>
										<div class="form-group">
											<label class="col-lg-3 control-label font">展览简介</label>
											<div class="col-lg-4">
												<input type="text" class="form-control" name="pdescript" placeholder="展览简介" value="{{$data->pdescript}}"/>
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
