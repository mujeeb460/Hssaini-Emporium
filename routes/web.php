<?php

use Laravel\Jetstream\Rules\Role;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SubCategoryController;
use App\Http\Controllers\ChildCategoryController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\PermissionsController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ContactController as FrontendContactController;
use App\Http\Controllers\Frontend\CartController as FrontendCartController;
use App\Http\Controllers\Frontend\DashboardController as FrontendDashboardController;
use App\Http\Controllers\Frontend\OrderController as FrontendOrderController;
use App\Http\Controllers\Frontend\UserController as FrontendUserController;
use App\Http\Controllers\Frontend\CustomerController as FrontendCustomerController;
use App\Http\Controllers\SocialAuthController;
use App\Http\Controllers\Frontend\MyAddressController as FrontendMyAddressController;
use App\Http\Controllers\Frontend\StripePaymentController;





use App\Http\Livewire\Index;
use App\Http\Livewire\Shop;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])
    ->group(function () {
        Route::get('/dashboard', function () {
            return Auth::user()->hasRole('Admin') ? redirect('admin/dashboard') : redirect('/');
        })->name('dashboard');
    });


//Customer Panel
Route::get('/', [FrontendDashboardController::class, 'index']);
// Route::get('/', Index::class)->name('home');
// Route::get('shop/{id?}', Shop::class)->name('shop');

// //Google Login routes
// Route::get('/login/google', [SocialAuthController::class, 'redirectToProvider'])->name('google.login');
// Route::get('/login/google/callback', [SocialAuthController::class, 'handleProviderCallback']);

// // Facebook login routes
// Route::get('/auth/facebook', [SocialAuthController::class, 'redirectToProvider'])->name('facebook.login');
// Route::get('/auth/facebook/callback', [SocialAuthController::class, 'handleProviderCallback']);

 Route::get('/login/{provider}', [SocialAuthController::class, 'redirectToProvider'])->name('social.login');
// Route::get('/auth/{provider}/callback', [SocialAuthController::class, 'handleProviderCallback']);

Route::get('/auth/facebook/callback', [SocialAuthController::class, 'handleFacebookCallback']);

Route::get('auth/google/callback', [SocialAuthController::class, 'handleGoogleCallback']);





Route::get('/product/{id?}/{title?}', [FrontendDashboardController::class, 'singleProduct'])->name('product');

Route::get('/shop/{type?}/{id?}', function ($type = null, $id = null, $title = null) {
    return view('frontend.shop', ['type' => $type, 'id' => $id, 'title' => $title ]);
})->name('shop');

Route::resource('cart', FrontendCartController::class);
Route::get('/addcart/{id?}/{title?}', [FrontendCartController::class, 'addCart'])->name('addcart');
Route::get('/contactus', [FrontendDashboardController::class, 'contact'])->name('contactus');
Route::resource('/contact', FrontendContactController::class);
Route::resource('/order', FrontendOrderController::class);
Route::post('/stripe', [StripePaymentController::class, 'stripePost'])->name('stripe');
Route::get('/myorder', [FrontendUserController::class, 'myorder'])->name('myorder');


// Admin Panel
Route::group(['middleware' => ['role:Admin'], 'prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::view('dashboard', 'dashboard');
    Route::resource('category', CategoryController::class);
    Route::resource('sub_category', SubCategoryController::class);
    Route::resource('child_category', ChildCategoryController::class);
    Route::resource('product', ProductController::class);
    Route::resource('customer', CustomerController::class);
    Route::resource('order', OrderController::class);
    Route::get('pendingOrders', [OrderController::class, 'pending_orders'])->name('pendingOrders');
    Route::get('processingOrders', [OrderController::class, 'processing_orders'])->name('processingOrders');
    Route::get('shippedOrders', [OrderController::class, 'shipped_orders'])->name('shippedOrders');
    Route::get('deliveredOrders', [OrderController::class, 'delivered_orders'])->name('deliveredOrders');
    Route::get('canceledOrders', [OrderController::class, 'canceled_orders'])->name('canceledOrders');

    Route::resource('users', UserController::class);
    Route::resource('roles', RoleController::class);
    Route::resource('permissions', PermissionsController::class);
});


Route::group(['middleware' => ['role:Customer'], 'prefix' => 'customer', 'as' => 'customer.'], function () {

    Route::resource('profile', FrontendCustomerController::class);
    Route::get('/setting', [FrontendCustomerController::class, 'change_password'])->name('change_password');
    Route::put('/setting', [FrontendCustomerController::class, 'update_password'])->name('update_password');
    Route::resource('myaddress', FrontendMyAddressController::class);

    Route::put('/cancel_order/{id}', [FrontendOrderController::class, 'cancel_order'])->name('cancel_order');

    Route::get('/CancelOrders', [FrontendOrderController::class, 'get_cancel_order'])->name('CancelOrders');



});
