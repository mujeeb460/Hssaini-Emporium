<?php

namespace App\Http\Livewire;

use Livewire\Component;

use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Product;
use App\Models\Order;

class CustomerProfile extends Component
{

	public $school_id, $item_name, $item_quantity, $item_value, $received_date, $note, $inventory_id;

	
    public function render()
    {
    	if (!Auth::user()) {
            return redirect()->route('login');
        }

        return view('livewire.customer-profile', [
            'user' => Auth::user(),
            'orders' => Order::with('orderDetails')->where('user_id', auth()->id())->get(),
        ]);
       
    }
}
