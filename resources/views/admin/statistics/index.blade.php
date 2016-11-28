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
			<div class="col-md-6">
				<div class="box-widget widget-module">
					<div class="widget-head clearfix">
						<span class="h-icon"><i class="fa fa-line-chart"></i></span>
						<h4>Line Chart</h4>
					</div>
					<div class="widget-container">
						<div class="widget-block">
							<div class="sparkline" data-type="line" data-resize="true" data-height="200" data-width="100%" data-line-width="1" data-line-color="#00acc1" data-spot-color="#00838f" data-fill-color="false" data-highlight-line-color="#0097a7" data-highlight-spot-color="#ff8a65" data-spot-radius="3" data-data="[450,480,500,590,600,640,560,530,500,540, 570,600,550,520,510,500,510,540,580,590,580,564,600,700]"></div>
						
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-6">
				<div class="box-widget widget-module">
					<div class="widget-head clearfix">
						<span class="h-icon"><i class="fa fa-area-chart"></i></span>
						<h4>Combined Line Chart</h4>
					</div>
					<div class="widget-container">
						<div class="widget-block">
							<div class="sparkline" data-type="line" data-resize="true" data-height="200" data-width="100%" data-line-width="1" data-line-color="#388e3c" data-spot-color="#00838f" data-fill-color="false" data-highlight-line-color="#0097a7" data-highlight-spot-color="#ff8a65" data-spot-radius="3" data-data="[500,590,620,690,700,740,660,530,600,640, 770,600,550,520,610,650,780,690,680,790,680,664,600,800]" data-stack-line-color="#ffb74d" data-stack-fill-color="rgba(190,100,10,.08)" data-stack-spot-color="#ef6c00" data-stack-spot-radius="3" data-compositedata="[450,480,500,590,600,640,560,530,500,540, 570,600,550,520,510,500,510,540,580,590,580,564,600,700]"></div>
						
						</div>
					</div>
				</div>
			</div>
    	 </div>
    	 
    </div>
</div>




@endsection
