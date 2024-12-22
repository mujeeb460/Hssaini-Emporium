<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Category;
use App\Models\Product;

class Shop extends Component
{
    public $categories = [];
    public $products = [];
    public $latestProducts = [];
    public $saleProducts = [];
    public $data = [
        'price' => ['min' => 0, 'max' => 0],
        'product' => ['total' => 0],
    ];
    public $selectedType = null;
    public $selectedId = null;

    public function mount($type, $id)
    {
        $this->categories = Category::with('subCategories.childCategories')->get();
        $this->latestProducts = Product::orderBy('id', 'desc')->limit(6)->get();
        $this->saleProducts = Product::inRandomOrder()->limit(6)->get();
        $this->setFilter($type,$id);
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
                case 'subCategory':
                    $query->where('subcategory_id', $this->selectedId);
                    break;
                case 'childCategory':
                    $query->where('childcategory_id', $this->selectedId);
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
        return view('livewire.shop', [
            'categories' => $this->categories,
            'products' => $this->products,
            'latestProducts' => $this->latestProducts,
            'saleProducts' => $this->saleProducts,
            'data' => $this->data
        ]);
    }
}
