@extends("layouts.admin")

@section("section")
<style type="text/css">	
	#imgPicker{
		border:none;
		background: none;
		outline: none;
	}
    .webuploader-element-invisible{
    	display: none;
    }
    .webuploader-container {
	position: relative;
}
.webuploader-element-invisible {
	position: absolute !important;
	clip: rect(1px 1px 1px 1px); /* IE6, IE7 */
    clip: rect(1px,1px,1px,1px);
}
.webuploader-pick {
	position: relative;
	display: inline-block;
	cursor: pointer;
	background: #00b7ee;
	padding: 10px 15px;
	color: #fff;
	text-align: center;
	border-radius: 3px;
	overflow: hidden;
}
.webuploader-pick-hover {
	background: #00a2d4;
}
.webuploader-pick-disable {
	opacity: 0.6;
	pointer-events:none;
}
</style>
<div class="main-container">
			<div class="container-fluid">
				<div class="page-breadcrumb">
					<div class="row">
						<div class="col-md-7">
							<div class="page-breadcrumb-wrap">
								<div class="page-breadcrumb-info">
									<h2 class="breadcrumb-titles font"> 创建展览 <small> 面板 </small></h2>
									<ul class="list-page-breadcrumb">
										<li><a href="#">Home</a>
										</li>
										<li class="active-page"> 创建展览 </li>
									</ul>
								</div>
							</div>
						</div>
						<div class="col-md-5">
                           <div class="btn-group pull-right " style="margin-top:30px;">
                                <a  href='{{url('admin/exhibit/store')}}' type="button" class="btn btn-default font"><i class="ico-plus"></i> 创建新的展览</a>
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
										<h2 class="font">创建一个新的展览</h2>
										<p class="font">
											你可以通过下面的表单创建一个新的展览 。
										</p>
									</div>
									<form id="SignUpForm"  class="form-horizontal" action="{{url('admin/exhibit')}}" method="post" >
                                        {{csrf_field()}}
										<div class="form-group">
											<label class="col-lg-3 control-label font">展览主题</label>
											<div class="col-lg-4">
												<input type="text" class="form-control" name="pname" placeholder="展览主题"  required />
											</div>
										</div>
											<div class="form-group" id="map">
											<label class="col-lg-3 control-label font">展览地图</label>
											<div class="col-lg-4">	
												<div class="imgShow">
												</div>
												<div id="imgPicker" class="wu-example" >
												</div>
												<div class="progress" style="display: none;">
												  <div class="progress-bar progress-bar-striped active" role="progressbar"  aria-valuemin="0" aria-valuemax="100" style="width: 70%">
												  </div>
												</div>
												<input type="hidden" class="form-control inputMap"   name="map" placeholder="展览地图" value=""/>
											</div>
										</div>
                                        <div class="form-group">
											<label class="col-lg-3 control-label  font">展览简介</label>
											<div class="col-lg-4">
												<input type="text" class="form-control" name="pdescript" placeholder="展览简介"/>
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
@endsection

@section("js")
<script type="text/javascript" src="{{asset('js/webuploader.min.js')}}"></script>

<script type="text/javascript">
	@if(count(count($errors) > 0))
		@foreach($errors->all() as $error)

			layer.msg('{{$error}}', {icon: 5});

		@endforeach

	@endif
	function init(){
			// 初始化Web Uploader
        var imgUpaloader = WebUploader.create({

            // 选完文件后，是否自动上传。
            auto: true,

            // swf文件路径
            swf: "{{asset('images/Uploader.swf')}}",


            // 文件接收服务端。
            server: "{{url('admin/uploader')}}",
            // 选择文件的按钮。可选。
            // 内部根据当前运行是创建，可能是input元素，也可能是flash.
            pick: {

            	id:'#imgPicker',
        		// 是否支持多文件上传
        		multiple:false,

        		innerHTML:"选择地图文件"

            },

            // 只允许选择图片文件。
            accept: {
                title: 'Images',
                extensions: 'gif,jpg,jpeg,bmp,png',
                mimeTypes: 'image/*'
            }
        });

        // 当有文件添加进来的时候
        imgUpaloader.on( 'fileQueued', function( file ) {
            	
               // console.log("添加进来了")
        });
        // 文件上传过程中创建进度条实时显示。
        imgUpaloader.on( 'uploadProgress', function( file, percentage ) {
        	 $("#imgPicker").css({"display":"none"});
        	$(".progress").css({
        		display:"block"
        	});
           	$(".progress .progress-bar").css({
           		width:percentage * 100 + '%'
           	})

        });

        // 文件上传成功，给item添加成功class, 用样式标记上传成功。
        imgUpaloader.on( 'uploadSuccess', function( file ) {

        });
        // 服务器成功返回响应
        imgUpaloader.on( 'uploadAccept', function( object ,ret) {
       	    $(".inputMap").val(ret.filename)
        	var img = new Image();
        	img.src="/upload/"+ret.filename;
        	img.setAttribute("class","thumbnail")
        	$(".imgShow").html(img)
        });

        // 文件上传失败，显示上传出错。
        imgUpaloader.on( 'uploadError', function( file ) {
            alert("上传失败");
        	 $("#imgPicker").css({"display":"block"});
        });

        // 完成上传完了，成功或者失败，先删除进度条。
        imgUpaloader.on( 'uploadComplete', function( file ) {
        	$(".progress").css({"display":"none"});
        });

	}

	//删除文件提示操作
	$(document).on("click",'.thumbnail',function(){
		layer.confirm('你确认删除图片么？', {
		  btn: ['确认','取消'] //按钮
		}, function(index){
			layer.close(index)
			$(".inputMap").val("");
		 	$('.thumbnail').hide();
			$("#imgPicker").css({"display":"block"});
		    init();
		}, function(){

			layer.close()

		  
		});
		
	})

	init();


</script>

@endsection
