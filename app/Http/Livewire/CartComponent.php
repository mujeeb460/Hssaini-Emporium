<?php
namespace App\Http\Livewire;

use App\Models\Cart;
use App\Models\Product;
use Livewire\Component;
use App\Models\ProductColor;
use Illuminate\Support\Facades\Auth;
use App\Models\ProductStorageCapacity;

class CartComponent extends Component
{
    public $product_id;
    public $qty = 1;
    public $price;
    public $productStock;
    public $colors = [];
    public $selectedColor;
    public $capacityOptions = [];
    public $selectedCapacity;
    public $currentImage;

    public $product;
    public $relatedProducts;

    public $color,$capacity, $selectCapacity, $selectColor, $isCart=false, $user_id;

    protected $listeners = ['updateCart'];

    public function mount($product, $relatedProducts)
    {
        $this->product = $product;
        $this->relatedProducts = $relatedProducts;
        $this->productStock = $product->stock;

        $this->user_id = Auth::user()->id ?? 0;

        $cart = Cart::where(['product_id'=> $this->product->id, 'user_id'=>$this->user_id])->first();
        if($cart)
        {
            $this->qty = $cart->qty;

            $this->isCart=true;
        }
        $this->updatedPrice();
    }

    public function changeColor($id)
    {
        $this->color = ProductColor::find($id);
        $this->updatedPrice();
    }

    public function changeCapacity($id)
    {
        $this->capacity = ProductStorageCapacity::find($id);
        $this->updatedPrice();
    }

    public function addToCart()
    {
        // Logic to add the product to the cart
        if ($this->qty > $this->productStock) {
            session()->flash('error', 'Quantity exceeds stock available.');
            return;
        }

        if($this->user_id != null || $this->user_id == 0)
        {
            $cart = Cart::where('product_id', $this->product->id)
            ->where('user_id', $this->user_id)
            ->firstOrNew();

            $cart->qty = $this->qty;
            $cart->size = $this->selectedCapacity;
            $cart->color = $this->selectedColor;
            $cart->product_id = $this->product->id;
            $cart->user_id = $this->user_id;
            $cart->save();

            session()->put('cart', $cart);

            $cartCount = Cart::where('user_id', $this->user_id)->count();
            $this->dispatchBrowserEvent('myCart', ['qty' => $cartCount]);
            session()->flash('success', 'Product added to cart!');
        }
        else
        {
            session()->flash('error', 'Please login first');
        }

    }

    public function updatedQty()
    {
        $this->updatedPrice();
    }

    public function updatedPrice()
    {
        if($this->capacity)
        {
            $this->price = $this->capacity->attribute_price;
        }
        else
        {
            $this->price = $this->product->price;
        }

        $this->price = $this->price*$this->qty;
    }

    public function render()
    {
        return view('livewire.cart-component');
    }

}
