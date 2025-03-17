@extends('layouts.web')
@section('title', 'Dashboard')
@section('content')

<div class="content-page">
    <div class="content">

        <!-- Start Content-->
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box">
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                            </ol>
                        </div>
                        <h4 class="page-title">Dashboard</h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">

                <div class="col-xl-3 col-sm-6">
                    <div class="card-box widget-box-two widget-two-custom">
                        <div class="media">
                            <div class="avatar-lg rounded-circle bg-primary widget-two-icon align-self-center">
                                <i class="mdi mdi-account-multiple avatar-title font-30 text-white"></i>
                            </div>

                            <div class="wigdet-two-content media-body">
                                <p class="m-0 text-uppercase font-weight-medium text-truncate" title="Statistics">Customers</p>
                                <h3 class="font-weight-medium my-2"> <span data-plugin="counterup">{{ $total_customers }}</span></h3>
                                <p class="m-0">{{date('d/m/Y')}}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end col -->

                <div class="col-xl-3 col-sm-6">
                    <div class="card-box widget-box-two widget-two-custom ">
                        <div class="media">
                            <div class="avatar-lg rounded-circle bg-primary widget-two-icon align-self-center">
                                <i class="mdi mdi-cart avatar-title font-30 text-white"></i>
                            </div>

                            <div class="wigdet-two-content media-body">
                                <p class="m-0 text-uppercase font-weight-medium text-truncate" title="Statistics">Products</p>
                                <h3 class="font-weight-medium my-2"> <span data-plugin="counterup">{{ $total_products }}</span></h3>
                                <p class="m-0">{{date('d/m/Y')}}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end col -->

                <div class="col-xl-3 col-sm-6">
                    <div class="card-box widget-box-two widget-two-custom ">
                        <div class="media">
                            <div class="avatar-lg rounded-circle bg-primary widget-two-icon align-self-center">
                                <i class="mdi mdi-crown avatar-title font-30 text-white"></i>
                            </div>

                            <div class="wigdet-two-content media-body">
                                <p class="m-0 text-uppercase font-weight-medium text-truncate" title="Statistics">Categories</p>
                                <h3 class="font-weight-medium my-2"><span data-plugin="counterup">{{ $total_categories }}</span></h3>
                                <p class="m-0">{{date('d/m/Y')}}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end col -->

                <div class="col-xl-3 col-sm-6">
                    <div class="card-box widget-box-two widget-two-custom ">
                        <div class="media">
                            <div class="avatar-lg rounded-circle bg-primary widget-two-icon align-self-center">
                                <i class="mdi mdi-auto-fix  avatar-title font-30 text-white"></i>
                            </div>

                            <div class="wigdet-two-content media-body">
                                <p class="m-0 text-uppercase font-weight-medium text-truncate" title="Statistics">Orders</p>
                                <h3 class="font-weight-medium my-2"><span data-plugin="counterup">{{ $total_orders }}</span></h3>
                                <p class="m-0">{{date('d/m/Y')}}</p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <!-- end row -->

            <!-- <div class="row">
                <div class="col-xl-4">
                    <div class="card-box">
                        <h4 class="header-title mb-4">Revenue Comparison</h4>

                        <div class="text-center">
                            <h5 class="font-weight-normal text-muted">You have to pay</h5>
                            <h3 class="mb-3"><i class="mdi mdi-arrow-up-bold-hexagon-outline text-success"></i> 25643 <small>USD</small></h3>
                        </div>

                        <div class="chart-container" dir="ltr">
                            <div class="" style="height:280px" id="platform_type_dates_donut"></div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-4">
                    <div class="card-box">
                        <h4 class="header-title mb-4">Visitors Overview</h4>

                        <div class="text-center">
                            <h5 class="font-weight-normal text-muted">You have to pay</h5>
                            <h3 class="mb-3"><i class="mdi mdi-arrow-down-bold-hexagon-outline text-danger"></i> 5623 <small>USD</small></h3>
                        </div>

                        <div class="chart-container" dir="ltr">
                            <div class="" style="height:280px" id="user_type_bar"></div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-4">
                    <div class="card-box">
                        <h4 class="header-title mb-4">Goal Completion</h4>

                        <div class="text-center">
                            <h5 class="font-weight-normal text-muted">You have to pay</h5>
                            <h3 class="mb-3"><i class="mdi mdi-arrow-up-bold-hexagon-outline text-success"></i> 12548 <small>USD</small></h3>
                        </div>

                        <div class="chart-container" dir="ltr">
                            <div class="chart has-fixed-height" style="height:280px" id="page_views_today"></div>
                        </div>
                    </div>
                </div>
            </div> -->
            <!-- end row -->


            <div class="row">
                <div class="col-xl-6 col-lg-12">
                    <div class="card-box">
                        <h4 class="header-title">Recent Orders</h4>
                        <p class="sub-header">
                            Latest Five Orders
                        </p>

                        <div class="table-responsive">
                            <table class="table table-hover m-0 table-actions-bar">

                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Location</th>
                                        <th>Products</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($last_orders as $order)
                                        <tr>
                                            <td>
                                                <h5 class="m-0 font-weight-medium">{{ $order->name }}</h5>
                                            </td>

                                            <td>
                                                <i class="mdi mdi-map-marker text-primary"></i> {{ $order->city }}
                                            </td>

                                            <td>
                                                @foreach($order->orderDetails as $detail)
                                                        {{ $detail->title }}@if(!$loop->last), @endif
                                                @endforeach
                                            </td>

                                            <td>
                                                {{ $order->status }} 
                                            </td>

                                        </tr>
                                    @endforeach    

                                    

                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
                <!-- end col -->

                <div class="col-xl-3 col-lg-6">
                    <div class="card-box">
                        <h4 class="header-title mb-4">Order Status</h4>

                        <div class="widget-chart text-center" dir="ltr">

                            <div id="donut-chart" style="height: 280px;"></div>

                            <div class="row text-center mt-4">
                                <div class="col-6">
                                    <h3 data-plugin="counterup">{{ $complete_orders }}</h3>
                                    <p class="text-muted mb-0">Delivered</p>
                                </div>
                                <div class="col-6">
                                    <h3 data-plugin="counterup">{{ $pending_orders }}</h3>
                                    <p class="text-muted mb-1">Pending</p>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="col-xl-3 col-lg-6">
                    <div class="card-box">
                        <h4 class="header-title mb-4">Order Details</h4>

                        <div class="widget-chart text-center" dir="ltr">

                            <div id="pie-chart" style="height: 280px;"></div>

                            <div class="row text-center mt-4">
                                <div class="col-6">
                                    <h3 data-plugin="counterup">{{ $shipped_orders }}</h3>
                                    <p class="text-muted mb-0">Shipped</p>
                                </div>
                                <div class="col-6">
                                    <h3 data-plugin="counterup">{{ $cancel_orders }}</h3>
                                    <p class="text-muted mb-1">Canceled</p>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
            <!--- end row -->

        </div> <!-- end container-fluid -->

    </div> <!-- end content -->
    @endsection

    @section('script')
    <!--C3 Chart-->
    <script src="{{asset('assets/libs/d3/d3.min.js')}}"></script>
    <script src="{{asset('assets/libs/c3/c3.min.js')}}"></script>

    <script src="{{asset('assets/libs/echarts/echarts.min.js')}}"></script>

    <script src="{{asset('assets/js/pages/dashboard.init.js')}}"></script>
    @endsection