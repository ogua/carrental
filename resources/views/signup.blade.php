@extends('layout')

@section('carousel')

<!-- Page Header Start -->
<div class="container-fluid page-header mb-5 p-0" style="background-image: url(img/carousel-bg-1.jpg);">
    <div class="container-fluid page-header-inner py-5">
        <div class="container text-center">
            <h1 class="display-3 text-white mb-3 animated slideInDown">Register</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb justify-content-center text-uppercase">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Pages</a></li>
                    <li class="breadcrumb-item text-white active" aria-current="page">About</li>
                </ol>
            </nav>
        </div>
    </div>
</div>
<!-- Page Header End -->

@endsection

@section('content')

<!-- Service Start -->
<div class="container-xxl py-5">
    <div class="container">
      <div class="col-md-8 offset-2" style="border: 1px solid #ccc;background-color: #fff;">

        @if (session()->has('success'))
            <div class="alert alert-dismissible alert-success">
                <h4>Success!</h4>
                    {{ session('success') }}
            </div>
        @endif


          <form method="post" action="/register" enctype="multipart/form-data">

            @csrf

            <div class="form-floating" style="margin-bottom: 10px;">
                        <input type="file" class="form-control" id="pic" name="pic" placeholder="Pic">
                        <label for="subject">Pic</label>
                    </div>

            <div class="row g-3">
                <div class="col-md-6">
                    <div class="form-floating">
                        <input type="text" class="form-control" id="fullname" name="fullname" placeholder="Your Name" value="{{ old('fullname') }}" required>
                        <label for="name">Fullname</label>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-floating">
                        <input type="email" class="form-control" name="email" id="email" value="{{ old('email') }}" placeholder="Your Email" required>
                        <label for="email">Your Email</label>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-floating">
                        <input type="text" class="form-control" id="phone" name="phone" value="{{ old('phone') }}" placeholder="Your phone" required>
                        <label for="name">Phone number</label>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-floating">
                        <input type="text" class="form-control" id="location" name="location" placeholder="Your Location" value="{{ old('location') }}" required>
                        <label for="Location">Location</label>
                    </div>
                </div>

                <div class="col-12">
                    <div class="form-floating">
                        <input type="password" class="form-control" id="password" name="password" value="{{ old('password') }}" placeholder="Password" required>
                        <label for="Password">Password</label>
                        <span class="text-danger">@error('password'){{ $message }} @enderror</span>
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-floating">
                        <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Password" required>
                        <label for="message">Confirm Password</label>
                    </div>
                </div>
                <div class="col-12">
                    <button class="btn btn-primary w-100 py-3" type="submit">Register</button>
                </div>
            </div>
        </form>  

    </div>  
</div>
</div>
<!-- Team End -->

@endsection
