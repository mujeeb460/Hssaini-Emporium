@extends('layouts.frontend')
@section('title', 'Login')
@section('content')
    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Login</h2>
                        <div class="breadcrumb__option">
                            <a href="/">Home</a>
                            <span>Login</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Login Form Begin -->
    <div class="contact-form spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="contact__form__title">
                        <h2>Login</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6 col-md-6 offset-lg-3 offset-md-3">
                    <x-jet-validation-errors class="mb-4" />
                </div>
            </div>
            <form action="{{ route('login') }}" method="post">
                @csrf
                <div class="row">
                    <div class="col-lg-6 col-md-6 offset-lg-3 offset-md-3">
                        <input type="email" name="email" placeholder="Your email" required>
                    </div>
                    <div class="col-lg-6 col-md-6 offset-lg-3 offset-md-3">
                        <input type="password" name="password" placeholder="Your password" required>
                    </div>
                    <div class="col-lg-6 col-md-6 offset-lg-3 offset-md-3 text-center">
                            <a href="{{ url('/login/google') }}" class="btn btn-outline-dark mr-3"><img src="{{ asset('images/google-icon.svg') }}" alt=""> GOOGLE</a>
                            <button type="submit" class="btn btn-outline-dark mr-3">LOGIN</button>
                            <a href="{{ url('/login/facebook') }}" class="btn btn-outline-dark"><img src="{{ asset('images/facebook.svg') }}" alt=""> FACEBOOK</a>
                        <div class="nav-item">
                            <a href="{{ route('register') }}" class="btn btn-outline-dark mt-2 mr-2">Register</a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- Contact Form End -->
@endsection
