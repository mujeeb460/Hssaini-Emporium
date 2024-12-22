@extends('layouts.frontend')
@section('title', 'Register')
@section('content')
    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Register</h2>
                        <div class="breadcrumb__option">
                            <a href="/">Home</a>
                            <span>Register</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Register Form Begin -->
    <div class="contact-form spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="contact__form__title">
                        <h2>Register</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6 col-md-6 offset-lg-3 offset-md-3 warning">
                    <x-jet-validation-errors class="mb-4 warning" />
                </div>
            </div>
            <form action="{{ route('register') }}" method="post">
                @csrf
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <input type="text" name="first_name" value="{{old('first_name')}}" placeholder="First Name">
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <input type="text" name="last_name" value="{{old('last_name')}}" placeholder="Last Name">
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <input type="email" name="email" value="{{old('email')}}" placeholder="Your Email">
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <input type="number" name="mobile" value="{{old('mobile')}}" placeholder="Mobile No">
                    </div>
                    <div class="col-lg-12 col-md-12">
                        <input type="text" name="address" value="{{old('address')}}" placeholder="Your Address">
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <input type="password" name="password" placeholder="Your password">
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <input type="password" name="password_confirmation" placeholder="Confirmation password">
                    </div>
                    <div class="col-lg-12 text-center">
                        <button type="submit" class="btn btn-outline-dark">REGISTER</button>
                        <div class="nav-item">
                            <a class="btn btn-outline-dark mt-2" href="{{ route('login') }}">Login</a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- Contact Form End -->
@endsection
