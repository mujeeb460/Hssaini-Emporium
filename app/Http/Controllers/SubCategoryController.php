<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Subcategory;



class SubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subCategories = Subcategory::with('category')->get();

        return view('admin.sub-category.index', compact('subCategories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::pluck('title', 'id');
        
        return view('admin.sub-category.create', compact('categories'));
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
            'category_id' => 'required', 'Integer', 
            'status' => 'required',
            'thumbnail' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        ]);


        //Upload image
        $thumbnail = $request->file('thumbnail')->store('public/uploads');
        $thumbnailFileName = basename($thumbnail);

        $category = new Subcategory;
        $category->title = $request->title;
        $category->status = $request->status;
        $category->thumbnail = $thumbnailFileName;
        $category->category_id = $request->category_id;
        $category->save();
        return redirect('admin/sub_category')->with('success', 'Sub Category successfull created!');
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
        //
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
        //
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
