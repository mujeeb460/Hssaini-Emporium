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
                                            <li class="breadcrumb-item active">View Roles</li>
                                        </ol>
                                    </div>
                                    <h4 class="page-title">Roles Management</h4>
                                </div>
                            </div>
                        </div>
                        <!-- end page title -->

                            <a href="{{ route('admin.roles.create') }}" class="btn btn-success mb-2">
                              <i class="fa fa-plus"></i> Add Role
                            </a>

                            <div class="row">
                                <div class="col-12">
                                    <div class="card-box table-responsive">
                                        <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                            <thead>
                                            <tr>
                                              <th>No</th>
                                              <th>Role</th>
                                              <th>Status</th>
                                              <th width="280px">Action</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach ($roles as $role)
                                              <tr>
                                                <td>{{$role->id}}</td>
                                                <td>{{$role->name}}</td>
                                                <td>
                                                  <label class="badge badge-info">On hold</label>
                                                </td>
                                                <td>
                                                  <a class="btn btn-success btn-xs" href="{{ route('admin.roles.show',$role->id) }}">
                                                    <i class="fas fa-check-square"></i>
                                                  </a>
                                                  <a class="btn btn-warning btn-xs" href="{{ route('admin.roles.edit',$role->id) }}">
                                                    <i class="far fa-edit"></i>
                                                  </a>
                                                    {!! Form::open(['method' => 'DELETE','route' => ['admin.roles.destroy', $role->id],'style'=>'display:inline']) !!}
                                                        {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs'] )  !!}
                                                    {!! Form::close() !!}
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
