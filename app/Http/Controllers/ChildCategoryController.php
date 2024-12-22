<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Childcategory;



class ChildCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $childCategories = ChildCategory::with(['subCategory.category'])->get();
        return view('admin.child-category.index', compact('childCategories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = ChildCategory::with(['subCategory.category'])->get();
        
        return view('admin.child-category.create', compact('categories'));
    }

    private function buildCategoryOptions($categories, $prefix = '')
    {
        $options = [];
        foreach ($categories as $category) {
            $options[$category->id] = $prefix . $category->title; // Add only top-level categories
        }
        return $options;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'category_id' => 'required|exists:categories,id',
            'subcategory_id' => 'nullable|exists:categories,id',
            'status' => 'required',
            'thumbnail' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        ]);

        //$categoryId = $request->subcategory_id ?? $request->category_id;

        //Upload image
        $thumbnail = $request->file('thumbnail')->store('public/uploads');
        $thumbnailFileName = basename($thumbnail);

        $category = new Childcategory;
        $category->title = $request->title;
        $category->status = $request->status;
        $category->thumbnail = $thumbnailFileName;
        $category->subcategory_id = $request->subcategory_id;
        $category->save();
        
        return redirect('admin/child_category')->with('success', 'Child Category successfull created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $childcategory = Childcategory::find($id);
        return view('admin.child-category.edit', compact('childcategory'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'status' => 'required'
        ]);

        $childcategory = Childcategory::find($id);

        if ($request->hasFile('thumbnail')) {
            //Upload image
            $thumbnail = $request->file('thumbnail')->store('public/uploads');
            $thumbnailFileName = basename($thumbnail);
            $childcategory->thumbnail = $thumbnailFileName;
        }

        $childcategory->title = $request->title;
        $childcategory->status = $request->status;
        $childcategory->update();

        return redirect('admin/child_category')->with('success', 'Child Category successfully updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
