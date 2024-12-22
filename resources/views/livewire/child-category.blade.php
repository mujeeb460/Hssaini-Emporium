<div class="row">
    <div class="col-xs-6 col-sm-6 col-md-6">
        <div class="form-group">
            <label for="category">Select Category:</label>
            <select wire:model.live="selectedCategory" name="category_id" id="category" class="form-control">
                <option value="">Select Category</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->title }}</option>
                @endforeach
            </select>
        </div>
    </div>

    <div class="col-xs-6 col-sm-6 col-md-6">
        <div class="form-group">
            <label for="subcategory">Select Subcategory:</label>
            <select wire:model.live="selectedSubcategory" name="subcategory_id" id="subcategory" {{ $subcategories ? '' : 'disabled' }} class="form-control">
                <option value="">Select Subcategory</option>
                @foreach($subcategories as $subcategory)
                    <option value="{{ $subcategory->id }}">{{ $subcategory->title }}</option>
                @endforeach
            </select>
        </div>
    </div>
</div>
