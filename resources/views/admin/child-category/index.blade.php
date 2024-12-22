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
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Child Category</a></li>
                                    <li class="breadcrumb-item active">View Child Categories</li>
                                </ol>
                            </div>
                            <h4 class="page-title">Child Categories</h4>
                        </div>
                    </div>
                </div>
                <!-- end page title -->

                <a href="{{ route('admin.child_category.create') }}" class="btn btn-success mb-2">
                    <i class="fa fa-plus"></i> Add Child Category
                </a>

                <div class="row">
                    <div class="col-12">
                        <div class="card-box table-responsive">
                            <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap"
                                style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Title</th>
                                        <th>Category</th>
                                        <th>Sub Category</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>

                                <tbody>
                                @foreach ($childCategories as $childCategory)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $childCategory->title }}</td>
                                        <td>{{ $childCategory->subCategory->category->title }}</td>
                                        <td>{{ $childCategory->subCategory->title }}</td>
                                        <td>
                                            @if($childCategory->status == 1)
                                                <span class="badge bg-success">Active</span>
                                            @else
                                                <span class="badge bg-danger">De-
                                                    Active</span> 
                                            @endif
                                        </td>
                                        <td>
                                            <a class="btn btn-warning btn-xs"
                                                href="{{ route('admin.child_category.edit', $childCategory->id) }}">
                                                                <i class="far fa-edit"></i>
                                            </a>
                                            {!! Form::open([
                                                'method' => 'DELETE',
                                                'route' => ['admin.category.destroy', $childCategory->id],
                                                'style' => 'display:inline',
                                                'onsubmit' => 'return confirm("Are you sure you want to delete?")',
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
