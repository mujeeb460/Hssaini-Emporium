<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Product;

class RelatedProducts extends Component
{
    public $product;
    public $relatedProducts;

    public function mount($product)
    {
        $this->product = $product;
        $this->relatedProducts = Product::where('category_id', $this->product->category_id)
            ->where('id', '!=', $this->product->id)
            ->take(4)
            ->get();
    }

    public function render()
    {
        return view('livewire.related-products');
    }
}
