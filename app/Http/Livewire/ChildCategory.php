<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\Subcategory;
use Livewire\Component;

class ChildCategory extends Component
{
    public $categories;
    public $subcategories = [];
    public $selectedCategory = null;
    public $selectedSubcategory = null;

    public function mount()
    {
        $this->categories = Category::all();
    }

    public function updatedSelectedCategory($categoryId)
    {
        $this->subcategories = Subcategory::where('category_id', $categoryId)->get();
        $this->selectedSubcategory = null; // Reset subcategory when category changes
    }

    public function render()
    {
        return view('livewire.child-category');
    }
}

