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
                                    <li class="breadcrumb-item active">View Users</li>
                                </ol>
                            </div>
                            <h4 class="page-title">Permissions Management</h4>
                        </div>
                    </div>
                </div>
                <!-- end page title -->
                <button type="button" class="btn btn-success mb-2" data-toggle="modal" data-target="#exampleModal-4"
                    data-whatever="@mdo"><i class="fa fa-plus"></i> Add Permissions</button>

                <div class="row">
                    <div class="col-12">
                        <div class="card-box table-responsive">
                            <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap"
                                style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Permission</th>
                                        <th>Status</th>
                                        <th width="280px">Action</th>
                                    </tr>
                                </thead>


                                <tbody>
                                    @foreach ($permissions as $permission)
                                        <tr>
                                            <td>{{ $permission->id }}</td>
                                            <td>{{ $permission->name }}</td>
                                            <td>
                                                <label class="badge badge-info">On hold</label>
                                            </td>
                                            <td>
                                                <a class="btn btn-success btn-xs"
                                                    href="{{ route('admin.permissions.show', $permission->id) }}">
                                                    <i class="fas fa-check-square"></i>
                                                </a>
                                                <a class="btn btn-warning btn-xs"
                                                    href="{{ route('admin.permissions.edit', $permission->id) }}">
                                                    <i class="far fa-edit"></i>
                                                </a>
                                                {!! Form::open([
                                                    'method' => 'DELETE',
                                                    'route' => ['admin.permissions.destroy', $permission->id],
                                                    'style' => 'display:inline',
                                                ]) !!}
                                                {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs']) !!}
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


        <div class="modal fade" id="exampleModal-4" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel-4"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel-4">New Permission</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <form method="POST" action="{{ route('admin.permissions.store') }}" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group">
                                <label for="message-text" class="col-form-label">Permission:</label>
                                <input type="text" class="form-control" id="message-text" name="name"></textarea>
                            </div>

                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success">Save</button>
                        <button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>

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
