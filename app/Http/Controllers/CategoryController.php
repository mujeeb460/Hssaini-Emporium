<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$categories = Category::get();
        $categories = Category::get();
        return view('admin.category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.category.create');
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
            'status' => 'required',
            'thumbnail' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        ]);

        //Upload image
        $thumbnail = $request->file('thumbnail')->store('public/uploads');
        $thumbnailFileName = basename($thumbnail);

        $category = new Category;
        $category->title = $request->title;
        $category->status = $request->status;
        $category->thumbnail = $thumbnailFileName;
        $category->save();
        return redirect('admin/category')->with('success', 'Category successfull created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view('admin.category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $request->validate([
            'title' => 'required',
            'status' => 'required'
        ]);

        if ($request->hasFile('thumbnail')) {
            //Upload image
            $thumbnail = $request->file('thumbnail')->store('public/uploads');
            $thumbnailFileName = basename($thumbnail);
            $category->thumbnail = $thumbnailFileName;
        }

        $category->title = $request->title;
        $category->status = $request->status;
        $category->update();

        return redirect('admin/category')->with('success', 'Category successfully updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $category->delete();
        return redirect('admin/category')->with('success', 'Category successfully deleted!');
    }
}
