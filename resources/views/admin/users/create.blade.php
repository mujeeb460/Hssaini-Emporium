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
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Users</a></li>
                                            <li class="breadcrumb-item active">Add User</li>
                                        </ol>
                                    </div>
                                    <h4 class="page-title">Add User</h4>
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

                                    <form action="{{Route('admin.users.store')}}" method="post" class="parsley-examples" novalidate="">
                                        {{ csrf_field() }}
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Name<span class="text-danger">*</span></label>
                                                    <input type="text" name="name" parsley-trigger="change" required
                                                        placeholder="Enter Name" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Email<span class="text-danger">*</span></label>
                                                    <input type="email" name="email" parsley-trigger="change" required
                                                        placeholder="Enter Email" class="form-control">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Password<span class="text-danger">*</span></label>
                                                    <input type="password" name="password" id="password" parsley-trigger="change" required
                                                        placeholder="Enter Password" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Confirm Password<span class="text-danger">*</span></label>
                                                    <input type="password" name="confirm-password" data-parsley-equalto="#password" required
                                                        placeholder="Enter Confirm Password" class="form-control">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>Role<span class="text-danger">*</span></label>
                                                    {!! Form::select('roles[]', $roles,[], array('class' => 'form-control','multiple','required')) !!}
                                                </div>
                                            </div>

                                        </div>

                                        <div class="form-group text-right mb-0">
                                            <button class="btn btn-primary waves-effect waves-light mr-1" type="submit">
                                                Submit
                                            </button>
                                            <button type="reset" class="btn btn-secondary waves-effect waves-light">
                                                Cancel
                                            </button>
                                        </div>

                                    </form>
                                </div> <!-- end card-box -->
                            </div>
                            <!-- end col -->
                        </div>
                        <!-- end row -->
                    </div> <!-- end container-fluid -->
                </div> <!-- end content -->

@endsection

@section('script')
<!-- Plugin js-->
<script src="{{asset('assets/libs/parsleyjs/parsley.min.js')}}"></script>

<!-- Validation init js-->
<script src="{{asset('assets/js/pages/form-validation.init.js')}}"></script>

<script src="{{asset('assets/libs/jquery-mask-plugin/jquery.mask.min.js')}}"></script>
<script src="{{asset('assets/libs/autonumeric/autoNumeric-min.js')}}"></script>
<script src="{{asset('assets/js/pages/form-masks.init.js')}}"></script>

@endsection
