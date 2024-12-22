@extends('layouts.web')
@section('title', 'Shipped Orders')
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
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Orders</a></li>
                                    <li class="breadcrumb-item active">Shipped Orders</li>
                                </ol>
                            </div>
                            <h4 class="page-title">Shipped Orders</h4>
                        </div>
                    </div>
                </div>
                <!-- end page title -->

                <div class="row">
                    <div class="col-12">
                        <div class="card-box table-responsive">
                            <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap"
                                style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Name</th>
                                        <th>Phone</th>
                                        <th>City</th>
                                        <th>Method</th>
                                        <th>Products</th>
                                        <th>Price</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>


                                <tbody>
                                    @foreach ($orders as $order)
                                        <tr>
                                            <td style="vertical-align: middle;">{{ $loop->iteration }}</td>
                                            <td style="vertical-align: middle;">{{ $order->name }}</td>
                                            <td style="vertical-align: middle;">{{ $order->phone }}</td>
                                            <td style="vertical-align: middle;">{{ $order->city }}</td>
                                            <td style="vertical-align: middle;">{{ $order->method }}</td>
                                            <td style="vertical-align: middle;">
                                                {{ $order->orderDetails()->sum('qty') }}
                                            </td>
                                            <td style="vertical-align: middle;">
                                                {{ $order->orderDetails()->sum(\DB::raw('price * qty')) }}</td>
                                            <td style="vertical-align: middle;">{{ $order->status }}</td>
                                            <td style="vertical-align: middle;">
                                                <a class="btn btn-success btn-xs"
                                                    href="{{ route('admin.order.show', $order->id) }}"><i
                                                        class="fas fa-check-square"></i>
                                                </a>
                                                {{-- <a class="btn btn-warning btn-xs"
                                                    href="{{ route('admin.order.edit', $order->id) }}">
                                                    <i class="far fa-edit"></i>
                                                </a> --}}

                                                {{-- {!! Form::open([
                                                    'method' => 'DELETE',
                                                    'route' => ['admin.order.destroy', $order->id],
                                                    'style' => 'display:inline',
                                                    'onsubmit' => 'return confirm("Are you sure you want to delete?")',
                                                ]) !!}
                                                {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs']) !!}
                                                {!! Form::close() !!} --}}
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- end row -->

            </div> <!-- end container-fluid -->

        </div> <!-- end content -->


    @endsection

    @section('style')
         <!-- third party css -->
        <link href="{{asset('assets/libs/datatables/dataTables.bootstrap4.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('assets/libs/datatables/buttons.bootstrap4.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('assets/libs/datatables/responsive.bootstrap4.css')}}" rel="stylesheet" type="text/css" />
    @endsection

    @section('script')

         <script src="{{asset('assets/libs/datatables/jquery.dataTables.min.js')}}"></script>
        <script src="{{asset('assets/libs/datatables/dataTables.bootstrap4.min.js')}}"></script>
        <!-- Buttons examples -->
        <script src="{{asset('assets/libs/datatables/dataTables.buttons.min.js')}}"></script>
        <script src="{{asset('assets/libs/datatables/buttons.bootstrap4.min.js')}}"></script>
        <script src="{{asset('assets/libs/jszip/jszip.min.js')}}"></script>
        <script src="{{asset('assets/libs/pdfmake/pdfmake.min.js')}}"></script>
        <script src="{{asset('assets/libs/pdfmake/vfs_fonts.js')}}"></script>
        <script src="{{asset('assets/libs/datatables/buttons.html5.min.js')}}"></script>
        <script src="{{asset('assets/libs/datatables/buttons.print.min.js')}}"></script>
        <script src="{{asset('assets/libs/datatables/buttons.colVis.js')}}"></script>

        <!-- Responsive examples -->
        <script src="{{asset('assets/libs/datatables/dataTables.responsive.min.js')}}"></script>
        <script src="{{asset('assets/libs/datatables/responsive.bootstrap4.min.js')}}"></script>

        <!-- Datatables init -->
        <script src="{{asset('assets/js/pages/datatables.init.js')}}"></script>

    @endsection
