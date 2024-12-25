<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Category;
use App\Models\Product;

class FeaturedProducts extends Component
{
    public $filter = '*'; // Default filter to show all products

    public $categories = [];
    public $products = [];

    public $selectedType = null;
    public $selectedId = null;
    public $data = [
        'price' => ['min' => 0, 'max' => 0],
        'product' => ['total' => 0],
    ];

    // public function mount()
    // {
    //     // Fetch all categories and products
    //     $this->categories = Category::all();
    //     $this->products = Product::all();
    // }

    public function mount($type = null, $id = null)
{
    $this->categories = Category::all();
    $this->selectedType = $type;
    $this->selectedId = $id;

    if ($type && $id) {
        $this->loadProducts();
    } else {
        $this->products = Product::all(); // Show all products by default
    }
}

    public function applyFilter($slug)
    {
        $this->filter = $slug;

        // If the "All" option is selected, show all products
        if ($slug === '*') {
            $this->products = Product::all();
        } else {
            // If a specific category is selected, filter products by category
            $this->products = Product::whereHas('category', function ($query) use ($slug) {
                $query->where('slug', $slug);
            })->get();
        }
    }

    public function setFilter($type, $id)
    {
        $this->selectedType = $type;
        $this->selectedId = $id;
        $this->loadProducts();
    }

    public function loadProducts()
    {
        $query = Product::query();

        // Filter logic
        if ($this->selectedType && $this->selectedId) {
            switch ($this->selectedType) {
                case 'category':
                    $query->where('category_id', $this->selectedId);
                    break;
                default:
                    $this->products = [];
                    return;
            }
        }

        $this->products = $query->get();
        $this->data['product']['total'] = $this->products->count();
    }

    public function render()
    {
        return view('livewire.featured-products', [
            'categories' => $this->categories,
            'products' => $this->products,
        ]);
    }
}
