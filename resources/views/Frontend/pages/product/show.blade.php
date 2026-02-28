@extends('Frontend.layout.master')

@section('title')
    {{ $product->title }} | Laravel Ecommerce Project
@endsection

@section('content')
{{-- 
 <div class="container">
      <div class="row">
        <div class="col-xl-5">
        	<div id="carouselExample" class="carousel slide">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="{{ asset('nature/03.jpg') }}" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="{{ asset('nature/02.jpg') }}" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="{{ asset('nature/03.jpg') }}" class="d-block w-100" alt="...">
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>
        </div>
      </div>
    </div> 
--}}


<div class="container margin-top-20">
    <div class="row">
        <div class="col-md-4">
            <div id="carouselExample" class="carousel slide">
            <div class="carousel-inner">
                @php
                    $i = 5;
                @endphp
                @foreach ($product->imagesFunction as $image)
                <div class="product-item carousel-item {{ $i == 5 ? 'active' : '' }} ">
                    <img src="{{ asset('images/products/'.$image->image) }}" class="d-block w-100" alt="">
                </div> 
                @php
                    $i++;
                @endphp
                @endforeach
                
                
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
            </div>
        </div>

        <div class="col-md-8">
            <div class="widget">
                <h3>{{ $product->title }}</h3>
                <h3>{{ $product->price }} Taka
                    <span class="badge text-bg-primary">
                        {{ $product->quantity < 1 ? 'No Item is Available' : $product->quantity.' Item is stock' }}
                    </span>
                </h3>
                <hr>

                <div class="product-description">
                    {{ $product->description }}
                </div>
            </div>
        </div>
    </div>
</div>













@endsection