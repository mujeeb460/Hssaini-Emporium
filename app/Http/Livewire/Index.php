<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Category;
use App\Models\Product;

class Index extends Component
{
    public $categories;
    public $products;
    public $letestProducts;
    public $topRatedProducts;
    public $reviewProducts;

    public function mount()
    {
        $this->categories = Category::get();
        $this->products = Product::with('category')->orderby('id', 'desc')->get();
        $this->letestProducts = Product::orderby('id', 'desc')->limit(6)->get();
        $this->topRatedProducts = Product::inRandomOrder()->limit(6)->get();
        $this->reviewProducts = Product::inRandomOrder()->limit(6)->get();
    }

    public function render()
    {
        return view('livewire.index')->layout('layouts.frontend');
    }
}

