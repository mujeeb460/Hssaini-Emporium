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
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Inventory</a></li>
                                    <li class="breadcrumb-item active">View Inventory</li>
                                </ol>
                            </div>
                            <h4 class="page-title">Inventory</h4>
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
                                        <th>Title</th>
                                        <th>Price</th>
                                        <th>Total Stock</th>
                                        <th>Available Stock</th>
                                        <th>Sold</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>


                                <tbody>
                                    @foreach ($products as $product)
                                        <tr>
                                            <td style="vertical-align: middle;">{{ $loop->iteration }}</td>
                                            <td style="vertical-align: middle;">{{ $product->title }}</td>
                                            <td style="vertical-align: middle;">{{ $product->price }}</td>
                                            <td style="vertical-align: middle;">{{ $product->total_stock }}</td>
                                            <td style="vertical-align: middle;">{{ $product->stock }}</td>
                                            <td style="vertical-align: middle;">{{ $product->orderDetail()->count() }}</td>
                                            
                                            <td style="vertical-align: middle;">
                                                <!-- <a class="btn btn-success btn-xs" href="{{ route('admin.product.show', $product->id) }}">
                                                            <i class="fas fa-check-square"></i>
                                                        </a> -->
                                                <a class="badge bg-success btn-xs" href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#addStockModal{{$product->id}}">
                                                    Add Stock
                                                </a>

                                                <!-- Add Stock Modal -->
                                                <div class="modal fade" id="addStockModal{{$product->id}}" tabindex="-1" aria-labelledby="addStockModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="addStockModalLabel">Add Stock</h5>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form action="{{ route('admin.inventory.update',$product->id)}}" method="POST">
                                                                    @csrf
                                                                    @method('PUT')
                                                                    <div class="mb-3">
                                                                        <label for="stock" class="form-label">Enter Stock Quantity</label>
                                                                        <input type="number" class="form-control" name="stock" id="stock" required>
                                                                    </div>
                                                                    <button type="submit" class="btn btn-primary">Update Stock</button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>


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
    <!-- Bootstrap CSS -->
<!-- Bootstrap JS (place before closing </body> tag) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>


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
