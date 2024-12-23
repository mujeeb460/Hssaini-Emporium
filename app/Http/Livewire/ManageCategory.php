<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Category;
use App\Models\Subcategory;
use App\Models\Childcategory;

class ManageCategory extends Component
{
	public $categories;
    public $subcategories = [];
    public $childCategories = [];
    public $selectedCategory = null;
    public $selectedSubcategory = null;
    public $selectedChildCategory = null;

    public function mount()
    {
        $this->categories = Category::all();
    }

    public function updatedSelectedCategory($categoryId)
    {
        $this->subcategories = Subcategory::where('category_id', $categoryId)->get();
        $this->childCategories = [];
        $this->selectedSubcategory = null;
        $this->selectedChildCategory = null;
    }

    public function updatedSelectedSubcategory($subcategoryId)
    {
        $this->childCategories = Childcategory::where('subcategory_id', $subcategoryId)->get();
        $this->selectedChildCategory = null;
    }

    public function render()
    {
        return view('livewire.manage-category');
    }
}
