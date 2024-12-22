@extends('layouts.frontend')
@section('title', 'Cart')
@section('content')

<style type="text/css">
    .btn-success {
    background-color: #7fad39;
    border-color: #4CAF50;
    color: white;
}
.btn-success:hover {
    background-color: #7fad39;
    border-color: #45A049;
}
</style>
    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Shopping Cart</h2>
                        <div class="breadcrumb__option">
                            <a href="/">Home</a>
                            <span>My Orders</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Shoping Cart Section Begin -->
    <section class="shoping-cart spad">
        <div class="container">
            <div class="row">
              
              <x-customer-sidebar />

                <div class="col-lg-10">
                    <section style="background-color: #eee;">
                          <div class="container py-3">
                            <div class="row">
                              <div class="col">
                                <nav aria-label="breadcrumb" class="bg-body-tertiary rounded-3 p-3 mb-4">
                                  <h4 style="text-align: center;">My Profile</h4>
                                </nav>
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-lg-4">
                                <div class="card mb-4">
                                  <div class="card-body text-center">
                                    @if($user->profile_photo_path)
                                    <img src="{{asset('storage/uploads/'.$user->profile_photo_path)}}" alt="avatar"
                                      class="rounded-circle img-fluid" style="width: 150px;">
                                    @else
                                    <img src="{{asset('images/account.png')}}" alt="avatar"
                                      class="rounded-circle img-fluid" style="width: 150px;">
                                    @endif

                                    <h5 class="my-3">{{$user->first_name}}</h5>
                                    <p class="text-muted mb-1">{{$user->last_name}}</p>
                                    <p class="text-muted mb-4">{{$user->address}}</p>
                                    <div class="d-flex justify-content-center mb-2">
                                      

                                    </div>
                                  </div>
                                </div>
            
                              </div>
                              
                                <div class="col-lg-8">
                                  <div class="card mb-4">
                                    <div class="card-body">
                                      <form action="{{ route('customer.profile.store') }}" method="post">
                                      @csrf
                                        <div class="row">
                                          <div class="col-sm-3">
                                            <p class="mb-0">First Name</p>
                                          </div>
                                          <div class="col-sm-9">
                                            <p class="text-muted mb-0">{{$user->first_name}}</p>
                                          </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                          <div class="col-sm-3">
                                            <p class="mb-0">Last Name</p>
                                          </div>
                                          <div class="col-sm-9">
                                            <p class="text-muted mb-0">{{$user->last_name}}</p>
                                          </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                          <div class="col-sm-3">
                                            <p class="mb-0">Email</p>
                                          </div>
                                          <div class="col-sm-9">
                                            <p class="text-muted mb-0">{{$user->email}}</p>
                                          </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                          <div class="col-sm-3">
                                            <p class="mb-0">Phone</p>
                                          </div>
                                          <div class="col-sm-9">
                                            <p class="text-muted mb-0">{{$user->mobile}}</p>
                                          </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                          <div class="col-sm-3">
                                            <p class="mb-0">Address</p>
                                          </div>
                                          <div class="col-sm-9">
                                            <p class="text-muted mb-0">{{$user->address}}</p>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 offset-lg-3 offset-md-3 text-center">
                                      <button type="submit" class="btn btn-outline-dark">EDIT</button>
                                    </div>
                                </div>
                              </form>
                            </div>
                          </div>
                        </section>
                </div>
            </div>
        </div>
    </section>
    <!-- Shoping Cart Section End -->
@endsection
@section('script')

@endsection
