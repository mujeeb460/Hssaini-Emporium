@extends('layouts.web')
@section('title', 'Order')
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
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Order</a></li>
                                    <li class="breadcrumb-item active">View Orders</li>
                                </ol>
                            </div>
                            <h4 class="page-title">Orders</h4>
                        </div>
                    </div>
                </div>
                <!-- end page title -->

                <div class="row">
                    <div class="col-12">
                        <div class="card-box">
                            <h3 class="my-3">Order Details</h3>
                            <div class="row my-2">
                                <div class="col-md-3 font-weight-bold">Name</div>
                                <div class="col-md-9">{{ $order->name }}</div>
                            </div>
                            <div class="row my-2">
                                <div class="col-md-3 font-weight-bold">Address</div>
                                <div class="col-md-9">{{ $order->address }}</div>
                            </div>
                            <div class="row my-2">
                                <div class="col-md-3 font-weight-bold">City</div>
                                <div class="col-md-9">{{ $order->city }}</div>
                            </div>
                            <div class="row my-2">
                                <div class="col-md-3 font-weight-bold">Phone</div>
                                <div class="col-md-9">{{ $order->phone }}</div>
                            </div>
                            <div class="row my-2">
                                <div class="col-md-3 font-weight-bold">Method</div>
                                <div class="col-md-9">{{ $order->method }}</div>
                            </div>
                            <div class="row my-2">
                                <div class="col-md-3 font-weight-bold">Date</div>
                                <div class="col-md-9">{{ $order->created_at }}</div>
                            </div>
                            {!! Form::model($order, [
                                'method' => 'PATCH',
                                'route' => ['admin.order.update', $order->id],
                                'files' => true,
                            ]) !!}
                            <div class="row my-2">
                                <div class="col-md-3 font-weight-bold">Status</div>
                                <div class="col-md-4">
                                    {!! Form::Select(
                                        'status',
                                        [
                                            'Pending' => 'Pending',
                                            'Processing' => 'Processing',
                                            'Shipped' => 'Shipped',
                                            'Delivered' => 'Delivered',
                                            'Canceled' => 'Canceled',
                                        ],
                                        null,
                                        [
                                            'placeholder' => 'Select',
                                            'class' => 'form-control',
                                        ],
                                    ) !!}
                                </div>
                                <div class="col-md-5">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </div>
                            {!! Form::close() !!}


                            <h3 class="my-3">Product Details</h3>
                            <div class="table-responsive">
                                <table id="datatable-buttons"
                                    class="table table-striped table-bordered dt-responsive nowrap"
                                    style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Image</th>
                                            <th>Name</th>
                                            <th>Color</th>
                                            <th>Size</th>
                                            <th>Price</th>
                                            <th>Qty</th>
                                            <th>Total</th>
                                        </tr>
                                    </thead>


                                    <tbody>
                                        @foreach ($order->orderDetails as $value)
                                            <tr>
                                                <td style="vertical-align: middle;">{{ $loop->iteration }}</td>
                                                <td><img src='{{ asset("storage/uploads/products/{$value->product->thumbnail}") }}'
                                                        class="rounded-circle" width="60"></td>
                                                <td style="vertical-align: middle;">{{ $value->title }}</td>
                                                <td style="vertical-align: middle;">{{ $value->color }}</td>
                                                <td style="vertical-align: middle;">{{ $value->size }}</td>
                                                <td style="vertical-align: middle;">{{ $value->price }}</td>
                                                <td style="vertical-align: middle;">{{ $value->qty }}</td>
                                                <td style="vertical-align: middle;">{{ $value->price * $value->qty }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end row -->

            </div> <!-- end container-fluid -->

        </div> <!-- end content -->


    @endsection

    @section('style')
        <!-- third party css -->
        <link href="assets/libs/datatables/dataTables.bootstrap4.css" rel="stylesheet" type="text/css" />
        <link href="assets/libs/datatables/buttons.bootstrap4.css" rel="stylesheet" type="text/css" />
        <link href="assets/libs/datatables/responsive.bootstrap4.css" rel="stylesheet" type="text/css" />
    @endsection

    @section('script')

        <!-- Required datatable js -->
        <script src="assets/libs/datatables/jquery.dataTables.min.js"></script>
        <script src="assets/libs/datatables/dataTables.bootstrap4.min.js"></script>
        <!-- Buttons examples -->
        <script src="assets/libs/datatables/dataTables.buttons.min.js"></script>
        <script src="assets/libs/datatables/buttons.bootstrap4.min.js"></script>
        <script src="assets/libs/jszip/jszip.min.js"></script>
        <script src="assets/libs/pdfmake/pdfmake.min.js"></script>
        <script src="assets/libs/pdfmake/vfs_fonts.js"></script>
        <script src="assets/libs/datatables/buttons.html5.min.js"></script>
        <script src="assets/libs/datatables/buttons.print.min.js"></script>
        <script src="assets/libs/datatables/buttons.colVis.js"></script>

        <!-- Responsive examples -->
        <script src="assets/libs/datatables/dataTables.responsive.min.js"></script>
        <script src="assets/libs/datatables/responsive.bootstrap4.min.js"></script>

        <!-- Datatables init -->
        <script src="assets/js/pages/datatables.init.js"></script>

    @endsection
