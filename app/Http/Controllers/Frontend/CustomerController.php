<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Product;
use App\Models\Order;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;




class CustomerController extends Controller
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
        $orders = Order::with('orderDetails')->where('user_id', auth()->id())->get();
        return view('customer.CustomerProfile', compact('orders','user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = Auth::user();
        $orders = Order::with('orderDetails')->where('user_id', auth()->id())->get();
        return view('customer.EditProfile', compact('orders','user'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        'first_name' => ['required', 'string', 'max:255'],
        'email' => ['required', 'email', 'max:255', 'unique:users,email,' . $id],
        'phone' => ['required'],
    ]);

    $user = User::findOrFail($id);

    $profileName = $user->profile_photo_path;

    if ($request->hasFile('profile_pic')) {
        $profile_pic = $request->file('profile_pic')->store('public/uploads');
        $profileName = basename($profile_pic);
    }

    $user->update([
        'first_name' => $request->first_name,
        'last_name' => $request->last_name,
        'email' => $request->email,
        'phone' => $request->phone,
        'address' => $request->address,
        'profile_photo_path' => $profileName,
    ]);

    return redirect()->route('customer.profile.index')->with('success', 'Profile updated successfully!');
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

    public function change_password()
    {
        $user = Auth::user();
        return view('customer.change_password', compact('user'));
    }

    public function update_password(Request $request)
    {
        $request->validate([
            'password' => 'required|confirmed',
        ]);

        $user = Auth::user();

        $new_password = Hash::make($request->password);

        $user->update([
            'password' => $new_password,
        ]);

        if($user)
        {
            return redirect()->back()->with('success', 'Passord updated successfully!');
        }else{

            return redirect()->back()->with('failed', 'Oooops! failed to update password');
        }

    }


}
