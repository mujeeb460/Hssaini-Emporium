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
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">order</a></li>
                                    <li class="breadcrumb-item active">Create order</li>
                                </ol>
                            </div>
                            <h4 class="page-title">Create order</h4>
                        </div>
                    </div>
                </div>
                <!-- end page title -->

                <div class="row">
                    <div class="col-lg-12">

                        <div class="card-box">

                            @if (count($errors) > 0)
                                <div class="alert alert-danger">
                                    <strong>Whoops!</strong> There were some problems with your input.<br><br>
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

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
                            {!! Form::model($order, [
                                'method' => 'PATCH',
                                'route' => ['admin.order.update', $order->id],
                                'files' => true,
                            ]) !!}
                            <div class="row my-2">
                                <div class="col-md-3 font-weight-bold">Status</div>
                                <div class="col-md-4">
                                    {!! Form::Select('status', ['1' => 'Active', '0' => 'Deactive'], null, [
                                        'placeholder' => 'Select',
                                        'class' => 'form-control',
                                    ]) !!}
                                </div>
                                <div class="col-md-5">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </div>
                            {!! Form::close() !!}
                            <div class="row my-2">
                                <div class="col-md-3 font-weight-bold">Date</div>
                                <div class="col-md-9">{{ $order->created_at }}</div>
                            </div>
                        </div> <!-- end card-box -->
                    </div>
                    <!-- end col -->
                </div>
                <!-- end row -->
            </div> <!-- end container-fluid -->
        </div> <!-- end content -->

    @endsection

    @section('style')
        <link href="{{ asset('assets/libs/summernote/summernote-bs4.css') }}" rel="stylesheet" type="text/css" />
    @endsection

    @section('script')
        <!-- Plugin js-->
        <script src="{{ asset('assets/libs/parsleyjs/parsley.min.js') }}"></script>

        <!-- Validation init js-->
        <script src="{{ asset('assets/js/pages/form-validation.init.js') }}"></script>

        <!-- Summernote js -->
        <script src="{{ asset('assets/libs/summernote/summernote-bs4.min.js') }}"></script>

        <script>
            $(document).ready(function() {
                $(".editor").summernote({
                    height: 250,
                    minHeight: null,
                    maxHeight: null,
                    focus: !1
                });
            });
        </script>
    @endsection
