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
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Roles</a></li>
                                            <li class="breadcrumb-item active">Add Role</li>
                                        </ol>
                                    </div>
                                    <h4 class="page-title">Add Role</h4>
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

                                    <form action="{{route('admin.roles.store')}}" method="post" class="parsley-examples" novalidate="">
                                        {{ csrf_field() }}
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>Role Name<span class="text-danger">*</span></label>
                                                    <input type="text" name="name" parsley-trigger="change" required
                                                        placeholder="Enter Role Name" class="form-control">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>Permission<span class="text-danger">*</span></label>
                                                    <div class="row">
                                                    @foreach($permission as $value)
                                                    <div class="col-md-3">
                                                    <label>{{ Form::checkbox('permission[]', $value->id, false, array('class' => 'name')) }}
                                                    {{ $value->name }}</label>
                                                    </div>
                                                    @endforeach
                                                    </div>
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
