@extends("layouts.admin")

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
                                <a  href='{{url('admin/addGoods')}}' type="button" class="btn btn-default font"><i class="ico-plus"></i>添加新的展品</a>
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
										<h2 class="font">编辑当前展品的信息	</h2>
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


										


										<div class="form-group"  id="mp">
											<label class="col-lg-3 control-label font">展品图片</label>
											<div class="col-lg-4">	
												<div class="imgShow" >
													<img src="/upload/{{$pic->resource_name}}" class="thumbnail1 thumbnail">	
												</div>
												<div id="imgPicker" class="wu-example" style="display: none;" >
													
												</div>
												<div class="progress" style="display: none;">
												  <div class="progress-bar progress-bar-striped active" role="progressbar"  aria-valuemin="0" aria-valuemax="100" style="width: 70%">
												  </div>
												</div>
												<input type="hidden" class="form-control inputMap"   name="pic" placeholder="展品图片" value="{{$pic->resource_name}}"/>
											</div>
										</div>




										<div class="form-group" id="mu" >
											<label class="col-lg-3 control-label font">展品音频</label>
											<div class="col-lg-4">	
												<div class="listening" >
													<div class="listening"><audio preload="auto" src="/upload/{{$music->resource_name}}" class="au" controls="controls"></audio><span class="btn btn-danger btn-sm thumbnail2 " style="margin-top: -24px;" '="">移除</span></div>
												</div>
												<div id="listenShow" class="wu-example"  style="display: none;" >
													    
												</div>
												<div class="progress" style="display: none;">
												  <div class="progress-bar progress-bar-striped active" role="progressbar"  aria-valuemin="0" aria-valuemax="100" style="width: 70%">
												  </div>
												</div>
												<input type="hidden" class="form-control music"   name="music" placeholder="展品音频" value="{{$music->resource_name}}"/>
											</div>
										</div>







                                        

                                        <div class="form-group">
											<label class="col-lg-3 control-label  font">展品介绍</label>
											<div class="col-lg-4">
												<input type="text" class="form-control" name="content" placeholder="展品介绍" value="{{$data->content}}" />
											</div>
										</div>

                                        <div class="page-header">
                                           
                                            <p class="font" style="">
                                                以下填写的是您在微信摇一摇申请号的beacon设备信息
                                            </p>
                                        </div>
                                       
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

@section("js")
<script type="text/javascript" src="{{asset('js/webuploader.min.js')}}"></script>
<script type="text/javascript">
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

        		innerHTML:"选择一张展品图片"

            },

            // 只允许选择图片文件。
            accept: {
                title: 'Images',
                extensions: 'gif,jpg,jpeg,bmp,png',
                mimeTypes: 'image/*'
            }
        });

        imgUpaloader.on( 'fileQueued', function( file ) {
            	
             // 当有文件添加进来的时候
               // console.log("添加进来了")
        });
        // 文件上传过程中创建进度条实时显示。
		// imgUpaloader.on( 'uploadProgress', function( file, percentage ) {
		// 	console.log(file.id)
		//     var $li = $( '#'+file.id ),
		//         $percent = $li.find('.progress .progress-bar');

		//     // 避免重复创建
		//     if ( !$percent.length ) {
		//         $percent = $('<div class="progress progress-striped active">' +
		//           '<div class="progress-bar" role="progressbar" style="width: 0%">' +
		//           '</div>' +
		//         '</div>').appendTo( $li ).find('.progress-bar');
		//     }

		//     $li.find('p.state').text('上传中');

		//     $percent.css( 'width', percentage * 100 + '%' );
		// });




        // 文件上传过程中创建进度条实时显示。
        imgUpaloader.on( 'uploadProgress', function( file, percentage ) {
        	 $("#imgPicker").css({"display":"none"});
        	$("#mp .progress").css({
        		display:"block"
        	});
           	$("#mp .progress .progress-bar").css({
           		width:percentage * 100 + '%'
           	})

        });

        // 文件上传成功，给item添加成功class, 用样式标记上传成功。
        imgUpaloader.on( 'uploadSuccess', function( file ) {

        });


        imgUpaloader.on( 'uploadAccept', function( object ,ret) {
       	    $(".inputMap").val(ret.filename)
        	var img = new Image();
        	img.src="/upload/"+ret.filename;
        	img.setAttribute("class","thumbnail1 thumbnail")
        	$(".imgShow").html(img)
        });

        

        // 文件上传失败，显示上传出错。
        imgUpaloader.on( 'uploadError', function( file ) {
            alert("上传失败");
        	 $("#imgPicker").css({"display":"block"});
        });

        // 完成上传完了，成功或者失败，先删除进度条。
        imgUpaloader.on( 'uploadComplete', function( file ) {
        	$("#mp .progress").css({"display":"none"});
        });


// -------------------------------------------------------------
        var musicUploader = WebUploader.create({

            auto: true,


            // swf文件路径
            swf: "{{asset('images/Uploader.swf')}}",

            // 文件接收服务端。
            server: '{{url('admin/uploader')}}',

            // 选择文件的按钮。可选。

            // 不压缩image, 默认如果是jpeg，文件上传前会压缩一把再上传！
            resize: false,
             // 内部根据当前运行是创建，可能是input元素，也可能是flash.
            pick: {

            	id:'#listenShow',
        		// 是否支持多文件上传
        		multiple:false,

        		innerHTML:"选择一个音频文件"

            },

        });

       
        // 文件上传过程中创建进度条实时显示。
        musicUploader.on( 'uploadProgress', function( file, percentage ) {
        	 $("#listenShow").css({"display":"none"});
        	$("#mu .progress").css({
        		display:"block"
        	});
           	$("#mu .progress .progress-bar").css({
           		width:percentage * 100 + '%'
           	})

        });

        // 文件上传成功，给item添加成功class, 用样式标记上传成功。
        musicUploader.on( 'uploadSuccess', function( file ) {

        });


        musicUploader.on( 'uploadAccept', function( object ,ret) {
       	    $(".music").val(ret.filename)
        	var img = new Audio();
        	img.src="/upload/"+ret.filename;
        	img.setAttribute("class","au");
        	img.setAttribute("controls","controls");
        	var remove =  "<span class=\'btn btn-danger btn-sm thumbnail2 \' style=\'margin-top: -24px;\''>移除</span>"
        	$(".listening").html(img)
        	$(".listening").append(remove)
        });

        

        // 文件上传失败，显示上传出错。
        musicUploader.on( 'uploadError', function( file ) {
            alert("上传失败");
        	 $("#listening").css({"display":"block"});
        });

        // 完成上传完了，成功或者失败，先删除进度条。
        musicUploader.on( 'uploadComplete', function( file ) {
        	$("#mu .progress").css({"display":"none"});
        });

	}

	init();

	$(document).on("click",'.thumbnail1',function(){
		layer.confirm('你确认删除图片么？', {
		  btn: ['确认','取消'] //按钮
		}, function(index){
			layer.close(index)
			$(".inputMap").val("");
		 	$('.thumbnail1').hide();
			$("#imgPicker").css({"display":"block"});
		    init();
		}, function(){

			layer.close()

		  
		});
		
	})

	$(document).on("click",'.thumbnail2',function(){
		layer.confirm('你确认移除音频么？', {
		  btn: ['确认','取消'] //按钮
		}, function(index){
			layer.close(index)
			$(".music").val("");
		 	$('.au').remove();
		 	$('.thumbnail2').remove();
			$("#listenShow").css({"display":"block"});
		    init();
		}, function(){

			layer.close()

		  
		});
		
	})

	@if (count($errors) > 0)
        @foreach ($errors->all() as $error)
            layer.alert('{{$error}}')
        @endforeach
	@endif

</script>
		


@endsection
