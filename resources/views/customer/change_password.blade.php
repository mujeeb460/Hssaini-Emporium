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
                        <h2>My Profile</h2>
                        <div class="breadcrumb__option">
                            <a href="/">Home</a>
                            <span>Change Password</span>
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
                                  <h4 style="text-align: center;">Change Password</h4>
                                </nav>
                              </div>
                            </div>
                            <form action="{{ route('customer.update_password') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
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
                                    </div>
                                  </div>
              
                                </div>
                                
                                  <div class="col-lg-8">
                                    <div class="card mb-4">
                                      <div class="card-body">
                                        
                                          <div class="row">
                                            <div class="col-sm-4">
                                              <p class="mb-0">New Password</p>
                                            </div>
                                            <div class="col-sm-8">
                                              <input type="password" class="form-control" name="password" required="">
                                            </div>
                                          </div>
                                          <hr>
                                          <div class="row">
                                            <div class="col-sm-4">
                                              <p class="mb-0">Re Enter Password</p>
                                            </div>
                                            <div class="col-sm-8">
                                              <input type="password" class="form-control" name="password_confirmation" required="">
                                            </div>
                                          </div>
                                          <hr>
                                        </div>
                                      </div>
                                      <div class="col-lg-6 col-md-6 offset-lg-3 offset-md-3 text-center">
                                        <button type="submit" class="btn btn-outline-dark">SUBMIT</button>
                                      </div>
                                  </div>
                              </div>
                            </form>
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
