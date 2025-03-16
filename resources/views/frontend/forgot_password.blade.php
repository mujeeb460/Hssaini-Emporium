@extends('layouts.frontend')
@section('title', 'Login')
@section('content')
    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Forgot Password</h2>
                        <div class="breadcrumb__option">
                            <a href="/">Home</a>
                            <span>Forgot Password</span>
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
                        <h2>Forgot Password</h2>
                    </div>

                    <div class="col-lg-6 col-md-6 offset-lg-3 offset-md-3">
                        @if (session('failed'))
                            <div class="alert alert-danger">
                                {{ session('failed') }}
                            </div>
                        @endif
                    </div>

                </div>
            </div>
            <div class="row">
                <div class="col-lg-6 col-md-6 offset-lg-3 offset-md-3">
                    <x-jet-validation-errors class="mb-4" />
                </div>
            </div>
            <form action="{{ route('check_forgot') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-lg-6 col-md-6 offset-lg-3 offset-md-3">
                        <input type="email" name="email" placeholder="Your email" required>
                    </div>
            
                    <div class="col-lg-6 col-md-6 offset-lg-3 offset-md-3">
                        <button type="submit" class="btn btn-dark btn-block">Forgot</button>
                    </div>

                </div>
            </form>
        </div>
    </div>
    <!-- Contact Form End -->
@endsection
