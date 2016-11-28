@extends("layouts.admin")

@section("section")



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
                </div>
            </div>
        </div>

      <div class="row">
        <div class="col-md-3 col-sm-6">
            <div class="iconic-w-wrap number-rotate">
                <span class="stat-w-title">Orders Today</span>
                <a href="#" class="ico-cirlce-widget w_bg_cyan">
                    <span><i class="fa fa-cart-plus"></i></span>
                </a>
                <div class="w-meta-info">
                    <span class="w-meta-value number-animate" data-value="330" data-animation-duration="1500">330</span>
                    <span class="w-meta-title">New Orders</span>
                    <span class="w-previos-stat">Last Day : 210</span>
                </div>
            </div>
        </div>

        <div class="col-md-3 col-sm-6">
            <div class="iconic-w-wrap iconic-w-wrap">
                <span class="stat-w-title">Members Today</span>
                <a href="#" class="ico-cirlce-widget w_bg_grey">
                    <span><i class="ico-users"></i></span>
                </a>
                <div class="w-meta-info">
                    <span class="w-meta-value number-animate" data-value="127" data-animation-duration="1500">127</span>
                    <span class="w-meta-title">New Users</span>
                    <span class="w-previos-stat">Last Day : 110</span>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6">
            <div class="iconic-w-wrap iconic-w-wrap">
                <span class="stat-w-title">Earnings Today</span>
                <a href="#" class="ico-cirlce-widget w_bg_blue_grey">
                    <span><i class="fa fa-dollar"></i></span>
                </a>
                <div class="w-meta-info w-currency">
                    <span class="w-meta-value number-animate" data-value="6127" data-animation-duration="1500">6,127</span>
                    <span class="w-meta-title">US Dollars</span>
                    <span class="w-previos-stat">Last Day : $4,110</span>
                </div>
            </div>
        </div>

        <div class="col-md-3 col-sm-6">
            <div class="iconic-w-wrap iconic-w-wrap">
                <span class="stat-w-title">Visitors Today</span>
                <a href="#" class="ico-cirlce-widget w_bg_green">
                    <span><i class="ico-chart"></i></span>
                </a>
                <div class="w-meta-info">
                    <span class="w-meta-value number-animate" data-value="20000" data-animation-duration="1500">20,000</span>
                    <span class="w-meta-title">New Visitors</span>
                    <span class="w-previos-stat">Last Day : 14,000</span>
                </div>
            </div>
        </div>
    </div>
















    </div>
</div>




@endsection