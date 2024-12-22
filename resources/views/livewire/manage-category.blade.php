<div class="row">
    <div class="col-xs-4 col-sm-4 col-md-4">
        <div class="form-group">
            <label for="category">Category:</label>
            <select wire:model="selectedCategory" id="category" name="category_id" class="form-control">
                <option value="">Select Category</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->title }}</option>
                @endforeach
            </select>
        </div>
    </div>

    <div class="col-xs-4 col-sm-4 col-md-4">
        <div class="form-group">
            <label for="subcategory">Subcategory:</label>
            <select wire:model="selectedSubcategory" name="subcategory_id" id="subcategory" {{ empty($subcategories) ? 'disabled' : '' }} class="form-control">
                <option value="">Select Subcategory</option>
                @foreach($subcategories as $subcategory)
                    <option value="{{ $subcategory->id }}">{{ $subcategory->title }}</option>
                @endforeach
            </select>
        </div>
    </div>

    <div class="col-xs-4 col-sm-4 col-md-4">
        <div class="form-group">
            <label for="childCategory">Child Category:</label>
            <select wire:model="selectedChildCategory" name="childcategory_id" id="childCategory" {{ empty($childCategories) ? 'disabled' : '' }} class="form-control">
                <option value="">Select Child Category</option>
                @foreach($childCategories as $childCategory)
                    <option value="{{ $childCategory->id }}">{{ $childCategory->title }}</option>
                @endforeach
            </select>
        </div>
    </div>
</div>
