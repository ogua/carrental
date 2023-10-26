@extends('layout')

@section('carousel')

<!-- Page Header Start -->
<div class="container-fluid page-header mb-5 p-0" style="background-image: url(img/carousel-bg-1.jpg);">
    <div class="container-fluid page-header-inner py-5">
        <div class="container text-center">
            <h1 class="display-3 text-white mb-3 animated slideInDown">Book</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb justify-content-center text-uppercase">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Pages</a></li>
                    <li class="breadcrumb-item text-white active" aria-current="page">{{ $car->brand }} - {{ $car->model }}</li>
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

        <!-- Team Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h6 class="text-primary text-uppercase">// Car Info //</h6>
                <h1 class="mb-5">{{ $car->brand }} - {{ $car->model }}</h1>
            </div>
            <div class="row g-4">
                <div class="col-md-5 wow fadeInUp" data-wow-delay="0.1s">
                    <img class="img-fluid" src="{{ asset('storage') }}/{{ $car->avatar }}" alt="">
                </div>

                <div class="offset-1 col-md-6 wow fadeInUp" data-wow-delay="0.1s">

              <h3 class="my-3">Plate number: {{ $car->platenum }}</h3>
              <p>Features: {{ $car->features }}</p>

              <hr>
              <div class="btn-group btn-group-toggle" data-toggle="buttons">
                <label class="btn btn-default text-center active">
                  <input type="radio" name="color_option" id="color_option_a1" autocomplete="off" checked>
                  Color {{ $car->color }}
                  <br>
                  <i class="fas fa-circle fa-2x text-{{ $car->color }}"></i>
                </label>
              </div>

              <hr>

              <div class="btn-group btn-group-toggle" data-toggle="buttons">
                <label class="btn btn-default text-center">
                  <input type="radio" name="color_option" id="color_option_b1" autocomplete="off">
                  <span class="text-xl">{{ $car->fueltype }}</span>
                  <br>
                  Fuel Type
                </label>
                <label class="btn btn-default text-center">
                  <input type="radio" name="color_option" id="color_option_b2" autocomplete="off">
                  <span class="text-xl">{{ $car->capacity }}</span>
                  <br>
                  capacity
                </label>
                <label class="btn btn-default text-center">
                  <input type="radio" name="color_option" id="color_option_b3" autocomplete="off">
                  <span class="text-xl">{{ $car->transmission }}</span>
                  <br>
                  Transmission
                </label>
              </div>

              <div class="bg-gray py-2 px-3 mt-4">
                <h2 class="mb-0">
                  Gh¢{{ $car->price }}
                </h2>
                <h4 class="mt-0">
                  <small>Per Day </small>
                </h4>
              </div>

              <div class="mt-4">
                <a href="/admin/book-cars/{{ $car->uniqueid }}">
                <div class="btn btn-primary btn-lg btn-flat">
                  <i class="fas fa-cart-plus fa-lg mr-2"></i>
                  Book Car
                </div></a>

              </div>

              <div class="mt-4 product-share">
                <a href="#" class="text-gray">
                  <i class="fab fa-facebook-square fa-2x"></i>
                </a>
                <a href="#" class="text-gray">
                  <i class="fab fa-twitter-square fa-2x"></i>
                </a>
                <a href="#" class="text-gray">
                  <i class="fas fa-envelope-square fa-2x"></i>
                </a>
                <a href="#" class="text-gray">
                  <i class="fas fa-rss-square fa-2x"></i>
                </a>
              </div>


                    
                </div>
            </div>

            

        </div>
    </div>
    <!-- Team End -->
       
    </div>
</div>
<!-- Team End -->

@endsection
