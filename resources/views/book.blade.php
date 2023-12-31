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
                    <li class="breadcrumb-item text-white active" aria-current="page">Book</li>
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
                <h6 class="text-primary text-uppercase">// Book A Cars //</h6>
                <h1 class="mb-5">Our Latest Cars</h1>
            </div>
            <div class="row g-4">

                @foreach($data as $car)

                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="team-item">
                        <div class="position-relative overflow-hidden" style="height: 210px;">
                            <a href="/car-info/{{ $car->id }}">
                            <img class="img-fluid" src="{{ asset('storage') }}/{{ $car->avatar }}" alt=""></a>
                        </div>
                        <div class="bg-light text-center p-4">
                           <a href="/car-info/{{ $car->id }}">
                            <h5 class="fw-bold mb-0">{{ $car->brand }} - {{ $car->model }}</h5>
                            <small>{{ $car->transmission }}</small> <br>
                            <small>Gh¢{{ $car->price }} Per Day</small></a>
                        </div>
                    </div>
                </div>
                @endforeach

                
            </div>
        </div>
    </div>
    <!-- Team End -->
       
    </div>
</div>
<!-- Team End -->

@endsection
