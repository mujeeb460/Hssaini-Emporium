<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\ProductColor;
use App\Models\ProductStorageCapacity;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::with(['category', 'subCategory', 'childCategory'])->get();
        return view('admin.product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::with(['subCategories.childCategories'])->get();
        return view('admin.product.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    // public function store(Request $request)
    // {
    //     // return $request;
    //     $request->validate([
    //         'title' => 'required',
    //         'description' => 'required',
    //         'category_id' => 'required|exists:categories,id',
    //         'subcategory_id' => 'nullable|exists:subcategories,id',
    //         'childcategory_id' => 'nullable|exists:childcategories,id',
    //         'price' => 'required',
    //         'stock' => 'required',
    //         'status' => 'required',
    //         'thumbnail' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
    //         'images.*' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
    //     ]);

    //     //$categoryId = $request->selectedSubcategory ?? $request->selectedCategory;

    //     // Store thumbnail
    //     $thumbnail = $request->file('thumbnail')->store('public/uploads');
    //     $thumbnailFileName = basename($thumbnail);

    //     // Store images
    //     $images = [];
    //     foreach ($request->file('images') as $file) {
    //         $imagePath = $file->store('public/uploads');
    //         // $images[] = $imagePath;
    //         $images[] = basename($imagePath);
    //     }

    //     $product = new Product;
    //     $product->title = $request->title;
    //     $product->description = $request->description;
    //     $product->category_id = $request->category_id;
    //     $product->subcategory_id = $request->subcategory_id;
    //     $product->childcategory_id = $request->childcategory_id;
    //     $product->price = $request->price;
    //     $product->mrp = $request->mrp;
    //     $product->thumbnail = $thumbnailFileName;
    //     $product->images = json_encode($images);
    //     $product->stock = $request->stock;
    //     $product->status = $request->status;
    //     $product->save();

    //     return redirect('admin/product')->with('success', 'Product successfully created!');
    // }

public function store(Request $request)
{
    $request->validate([
        'title' => 'required',
        'description' => 'required',
        'category_id' => 'required|exists:categories,id',
        'price' => 'required|numeric',
        'stock' => 'required|integer',
        'status' => 'required|boolean',
        'thumbnail' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        'images.*' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
    ]);


    // Store thumbnail
    $thumbnail = $request->file('thumbnail')->store('public/uploads');
    $thumbnailFileName = basename($thumbnail);

    // Store images
    $images = [];
    foreach ($request->file('images') as $file) {
        $images[] = basename($file->store('public/uploads'));
    }

    // Create Product
    $product = Product::create([
        'title' => $request->title,
        'description' => $request->description,
        'category_id' => $request->category_id,
        'subcategory_id' => $request->subcategory_id,
        'childcategory_id' => $request->childcategory_id,
        'price' => $request->price,
        'mrp' => $request->mrp,
        'thumbnail' => $thumbnailFileName,
        'images' => json_encode($images),
        'total_stock' => $request->stock,
        'stock' => $request->stock,
        'status' => $request->status,
    ]);

    // Add Colors
   if ($request->has('colors')) {
    foreach ($request->colors as $color) {
        // Validate each color array to ensure the required keys exist
        if (isset($color['name']) && isset($color['image'])) {
            // Store the image
            $colorImage = $color['image']->store('public/uploads');

            // Save the product color data in the database
            ProductColor::create([
                'product_id' => $product->id,
                'color_name' => $color['name'],
                'color_image' => basename($colorImage),
            ]);
        }
    }
}

//     if ($request->has('storage_capacity') && count($request->storage_capacity) > 0) 
//     {

//     foreach ($request->storage_capacity as $key => $capacity) 
//     {
//         // Ensure corresponding price exists for each capacity
//         if (isset($request->capacity_prices[$key])) 
//         {
//             ProductStorageCapacity::create([
//                 'product_id' => $product->id,
//                 'capacity' => $capacity,
//                 'price' => $request->capacity_prices[$key],
//             ]);
//         }
//     }
// }


if ($request->has('attribute_type') && !empty($request->attribute_type)) 
{
    foreach ($request->attribute_detail as $key => $detail) 
    {
        // Ensure corresponding price exists for each detail
        if (isset($request->attribute_price[$key])) 
        {
            ProductStorageCapacity::create([
                'product_id' => $product->id,
                'attribute_type' => $request->attribute_type, // Single string value
                'attribute_detail' => $detail,
                'attribute_price' => $request->attribute_price[$key],
            ]);
        }
    }
}




// if ($request->has('attribute_type')) {
//     // Convert to array if it's a string
//     $attributeTypes = is_array($request->attribute_type) ? $request->attribute_type : [$request->attribute_type];
//     $attributeDetails = is_array($request->attribute_detail) ? $request->attribute_detail : [$request->attribute_detail];
//     $attributePrices = is_array($request->attribute_price) ? $request->attribute_price : [$request->attribute_price];

//     foreach ($attributeTypes as $key => $capacity) {
//         // Ensure corresponding detail and price exist
//         if (isset($attributeDetails[$key]) && isset($attributePrices[$key])) {
//             ProductStorageCapacity::create([
//                 'product_id' => $product->id,
//                 'attribute_type' => $capacity,
//                 'attribute_detail' => $attributeDetails[$key],
//                 'attribute_price' => $attributePrices[$key],
//             ]);
//         }
//     }
// }



    return redirect()->route('admin.product.index')->with('success', 'Product created successfully!');
}



    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $category = Category::pluck('title', 'id');
        return view('admin.product.edit', compact('product', 'category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'category_id' => 'required',
            'price' => 'required',
            'mrp' => 'required',
            'stock' => 'required',
            'status' => 'required',
            'thumbnail' => 'image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        ]);

        // Store thumbnail
        if ($request->hasFile('thumbnail')) {
            $thumbnail = $request->file('thumbnail')->store('public/uploads');
            $thumbnailFileName = basename($thumbnail);
            $product->thumbnail = $thumbnailFileName;
        }

        // Store images
        if ($request->hasFile('images')) {
            $images = [];
            foreach ($request->file('images') as $file) {
                $imagePath = $file->store('public/uploads');
                // $images[] = $imagePath;
                $images[] = basename($imagePath);
            }
            $product->images = json_encode($images);
        }

        $product->title = $request->title;
        $product->description = $request->description;
        $product->category_id = $request->category_id;
        $product->price = $request->price;
        $product->mrp = $request->mrp;
        $product->stock = $request->stock;
        $product->status = $request->status;
        $product->update();

        return redirect('admin/product')->with('success', 'Product successfully updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect('admin/product')->with('success', 'Product successfully delete!');
    }
}
