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
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Product</a></li>
                                <li class="breadcrumb-item active">Create Product</li>
                            </ol>
                        </div>
                        <h4 class="page-title">Create Product</h4>
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

                        {!! Form::open(['route' => ['admin.product.store'],'files' => true]) !!}
                        <div class="row">
                            <!-- Title -->
                            <div class="col-xs-6 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <strong>Title:</strong>
                                    {!! Form::text('title', null, ['placeholder' => 'Title','class' => 'form-control', 'required' => 'required']) !!}
                                </div>
                            </div>

                            <!-- Price -->
                            <div class="col-xs-6 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <strong>Price:</strong>
                                    {!! Form::number('price', null, ['placeholder' => 'Price','class' => 'form-control', 'required' => 'required']) !!}
                                </div>
                            </div>
                        </div>
                            
                        <livewire:manage-category />

                        <div class="row">
                            <!-- MRP -->
                            <div class="col-xs-6 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <strong>MRP:</strong>
                                    {!! Form::number('mrp', null, ['placeholder' => 'MRP','class' => 'form-control']) !!}
                                </div>
                            </div>

                            <!-- Thumbnail -->
                            <div class="col-xs-6 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <strong>Thumbnail:</strong>
                                    {!! Form::file('thumbnail',['class' => 'form-control']) !!}
                                </div>
                            </div>

                            <!-- Images -->
                            <div class="col-xs-6 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <strong>Images:</strong>
                                    {!! Form::file('images[]',['class' => 'form-control','multiple' => 'multiple']) !!}
                                </div>
                            </div>

                            <!-- Stock -->
                            <div class="col-xs-6 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <strong>Stock:</strong>
                                    {!! Form::number('stock', null, ['placeholder' => 'Stock','class' => 'form-control', 'required' => 'required']) !!}
                                </div>
                            </div>

                            <!-- Status -->
                            <div class="col-xs-6 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <strong>Status:</strong>
                                    {!! Form::Select('status',['1'=>'Active','0'=>'Deactive'],null, ['placeholder' => 'Select','class' => 'form-control', 'required' => 'required']) !!}
                                </div>
                            </div>
                        </div>

                        <!-- Colors -->
                        <div class="form-group">
                            <label for="colors"><strong>Colors</strong></label>
                            <div id="color-fields">
                                <div class="row mb-2">
                                    <div class="col">
                                        <input type="text" name="colors[0][name]" class="form-control" placeholder="Color Name">
                                    </div>
                                    <div class="col">
                                        <input type="file" name="colors[0][image]" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <button type="button" class="btn btn-secondary btn-sm mt-2" onclick="addColorField()">Add Color</button>
                        </div>

                            <!-- Select Attributes -->

                        <div class="form-group">
                            <label for="attribute_type"><strong>Attribute Type</strong></label>
                            <select id="attribute_type" name="attribute_type" class="form-control" onchange="updateAttributeFields()">
                                <option value="">Select Attribute</option>
                                <option value="capacity">Capacity</option>
                                <option value="kg">Kg</option>
                                <option value="weight">Weight</option>
                                <option value="type">Type</option>
                                <option value="size">Size</option>
                            </select>
                        </div>

                        <!-- Dynamic Fields -->
                        <div id="dynamic-fields"></div>



                        <!-- Storage Capacities -->
                        <!-- <div class="form-group">
                            <label for="storage_capacity"><strong>Storage Capacities</strong></label>
                            <div id="storage-capacity-fields">
                                <input type="text" name="storage_capacity[]" class="form-control mb-2" placeholder="e.g., 64GB">
                            </div>
                            <button type="button" class="btn btn-secondary btn-sm" onclick="addStorageField()">Add Capacity</button>
                        </div>

                        Capacity Prices
                        <div class="form-group">
                            <label for="capacity_prices"><strong>Capacity Prices</strong></label>
                            <div id="capacity-price-fields">
                                <input type="text" name="capacity_prices[]" class="form-control mb-2" placeholder="Price for 64GB">
                            </div>
                            <button type="button" class="btn btn-secondary btn-sm" onclick="addCapacityPriceField()">Add Price</button>
                        </div> -->

                        <!-- Description -->
                        <div class="col-xs-12 col-sm-12 col-md-12 mt-4">
                            <div class="form-group">
                                <strong>Description:</strong>
                                {!! Form::textarea('description', null, ['placeholder' => 'Description','class' => 'form-control editor', 'required' => 'required']) !!}
                            </div>
                        </div>

                        <!-- Submit Button -->
                        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>

                        {!! Form::close() !!}
                    </div> <!-- end card-box -->
                </div>
                <!-- end col -->
            </div>
            <!-- end row -->
        </div> <!-- end container-fluid -->
    </div> <!-- end content -->
@endsection

@section('style')
<link href="{{asset('assets/libs/summernote/summernote-bs4.css')}}" rel="stylesheet" type="text/css" />
@endsection

@section('script')
<script src="{{asset('assets/libs/parsleyjs/parsley.min.js')}}"></script>
<script src="{{asset('assets/js/pages/form-validation.init.js')}}"></script>
<script src="{{asset('assets/libs/summernote/summernote-bs4.min.js')}}"></script>

<script>
    $(document).ready(function() {
        $(".editor").summernote({
            height: 250,
            focus: false
        });
    });

    function addColorField() {
        const colorFields = document.getElementById('color-fields');
        const index = colorFields.children.length;
        const newRow = `
            <div class="row mb-2">
                <div class="col">
                    <input type="text" name="colors[${index}][name]" class="form-control" placeholder="Color Name">
                </div>
                <div class="col">
                    <input type="file" name="colors[${index}][image]" class="form-control">
                </div>
            </div>`;
        colorFields.insertAdjacentHTML('beforeend', newRow);
    }

    function addStorageField() {
        const field = `<input type="text" name="storage_capacity[]" class="form-control mb-2" placeholder="e.g., 128GB">`;
        document.getElementById('storage-capacity-fields').insertAdjacentHTML('beforeend', field);
    }

    function addCapacityPriceField() {
        const priceField = `<input type="text" name="capacity_prices[]" class="form-control mb-2" placeholder="Price for 128GB">`;
        document.getElementById('capacity-price-fields').insertAdjacentHTML('beforeend', priceField);
    }





   function updateAttributeFields() {
    const selectedAttribute = document.getElementById('attribute_type').value;
    const dynamicFields = document.getElementById('dynamic-fields');

    if (!selectedAttribute) {
        dynamicFields.innerHTML = '';
        return;
    }

    let inputLabel, placeholderText;
    switch (selectedAttribute) {
        case 'capacity': inputLabel = 'Capacity'; placeholderText = 'e.g., 64GB'; break;
        case 'kg': inputLabel = 'Kg'; placeholderText = 'e.g., 5kg'; break;
        case 'weight': inputLabel = 'Weight'; placeholderText = 'e.g., 200g'; break;
        case 'type': inputLabel = 'Type'; placeholderText = 'e.g., Organic'; break;
        case 'size': inputLabel = 'Size'; placeholderText = 'e.g., Large'; break;
        default: return;
    }

    dynamicFields.innerHTML = `
        <div id="fields-wrapper">
            <div class="field-group">
                <div class="form-group">
                    <label><strong>${inputLabel}</strong></label>
                    <input type="text" name="attribute_detail[]" class="form-control mb-2" placeholder="${placeholderText}">
                </div>
                <div class="form-group">
                    <label><strong>Price</strong></label>
                    <input type="text" name="attribute_price[]" class="form-control mb-2" placeholder="Enter Price">
                </div>
            </div>
        </div>
        <button type="button" class="btn btn-secondary btn-sm mt-2" onclick="addMoreFields()">Add More</button>
    `;
}

function addMoreFields() {
    const wrapper = document.getElementById('fields-wrapper');
    const newField = document.createElement('div');
    newField.classList.add('field-group');
    newField.innerHTML = `
        <div class="form-group">
            <input type="text" name="attribute_detail[]" class="form-control mb-2" placeholder="Enter Attribute Detail">
        </div>
        <div class="form-group">
            <input type="text" name="attribute_price[]" class="form-control mb-2" placeholder="Enter Price">
        </div>
    `;
    wrapper.appendChild(newField);
}





</script>
@endsection
