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
                                            <li class="breadcrumb-item active">View Role</li>
                                        </ol>
                                    </div>
                                    <h4 class="page-title">View Role</h4>
                                </div>
                            </div>
                        </div>     
                        <!-- end page title --> 

                        <div class="row">
                            <div class="col-lg-12">

                                <div class="card-box">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>Role Name</label><br/>
                                                    <strong>{{ $role->name }}</strong>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>Permission</label>
                                                    <div class="row">
                                                    @if(!empty($rolePermissions))
                                                    @foreach($rolePermissions as $value)
                                                    <div class="col-md-3">
                                                    <label class="badge badge-success d-block p-1" style="font-size: 12px">{{ $value->name }}</label>
                                                    </div>
                                                    @endforeach
                                                    @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

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