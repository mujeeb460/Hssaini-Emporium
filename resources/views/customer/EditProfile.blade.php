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
                            <span>Edit Profile</span>
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
                                  <h4 style="text-align: center;">Edit Profile</h4>
                                </nav>
                              </div>
                            </div>
                            <form action="{{ route('customer.profile.update',$user->id) }}" method="post" enctype="multipart/form-data">
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
                                      <h5 class="my-3">{{$user->first_name}} <br/> {{$user->last_name}}</h5>
                                        <div>
                                          <button type="submit" class="site-btn" style="width: 240px;"><input type="file" name="profile_pic" value="{{$user->last_name}}"></button>
                                        </div>
                                    </div>
                                  </div>
              
                                </div>
                                
                                  <div class="col-lg-8">
                                    <div class="card mb-4">
                                      <div class="card-body">
                                        
                                          <div class="row">
                                            <div class="col-sm-3">
                                              <p class="mb-0">First Name</p>
                                            </div>
                                            <div class="col-sm-9">
                                              <input type="text" class="form-control" name="first_name" value="{{$user->first_name}}">
                                            </div>
                                          </div>
                                          <hr>
                                          <div class="row">
                                            <div class="col-sm-3">
                                              <p class="mb-0">Last Name</p>
                                            </div>
                                            <div class="col-sm-9">
                                              <input type="text" class="form-control" name="last_name" value="{{$user->last_name}}">
                                            </div>
                                          </div>
                                          <hr>
                                          <div class="row">
                                            <div class="col-sm-3">
                                              <p class="mb-0">Email</p>
                                            </div>
                                            <div class="col-sm-9">
                                              <input type="email" class="form-control" name="email" value="{{$user->email}}">
                                            </div>
                                          </div>
                                          <hr>
                                          <div class="row">
                                            <div class="col-sm-3">
                                              <p class="mb-0">Phone</p>
                                            </div>
                                            <div class="col-sm-9">
                                              <input type="text" class="form-control" name="phone" value="{{$user->mobile}}">
                                            </div>
                                          </div>
                                          <hr>
                                          <div class="row">
                                            <div class="col-sm-3">
                                              <p class="mb-0">Address</p>
                                            </div>
                                            <div class="col-sm-9">
                                              <input type="text" class="form-control" name="address" value="{{$user->address}}">
                                            </div>
                                          </div>
                                        </div>
                                      </div>
                                      <div class="col-lg-6 col-md-6 offset-lg-3 offset-md-3 text-center">
                                        <button type="submit" class="btn btn-outline-dark">UPDATE</button>
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
