<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\MyAdress;
use Illuminate\Support\Facades\Auth;

class MyAddressController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (!Auth::user()) {
            return redirect()->route('login');
        }

        $user = Auth::user();
        $addresses = MyAdress::where('user_id', auth()->id())->get();
        return view('customer.myaddress', compact('addresses','user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('customer.createAddress');
        
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
            'first_name' => 'required|string',
            'phone' => 'required',
            'city' => 'required',
            'shipping_address' => 'required',
        ]);

        $user = Auth::user();

        $address = new MyAdress;
        $address->first_name = $request->first_name;
        $address->last_name = $request->last_name;
        $address->phone = $request->phone;
        $address->city = $request->city;
        $address->area = $request->area;
        $address->shipping_address = $request->shipping_address;
        $address->user_id = $user->id;
        $address->save();
        return redirect()->route('customer.myaddress.index')->with('success', 'Address added successfull!');
        
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
        if (!Auth::user()) {
            return redirect()->route('login');
        }

        $user = Auth::user();
        $address = MyAdress::where('id',$id)->where('user_id', auth()->id())->first();
        return view('customer.editAddress', compact('address'));
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
        $request->validate([
            'first_name' => 'required|string',
            'phone' => 'required',
            'city' => 'required',
            'shipping_address' => 'required',
        ]);

        $user = Auth::user();

        $address =MyAdress::find($id);

        $address->update([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'phone' => $request->phone,
            'city' => $request->city,
            'area' => $request->area,
            'shipping_address' => $request->shipping_address,
            'user_id' => $user->id
        ]);

       
        return redirect()->route('customer.myaddress.index')->with('success', 'Address updated successfull!');
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
