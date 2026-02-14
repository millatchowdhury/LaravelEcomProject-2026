@extends('Frontend.layout.master')

@section('content')

<div class="main-content-area">
        <div class="container">
            <div class="row">
                <div class="col-xl-2">
                    @include('Frontend.partials.sidebar')
                </div>
                <div class="col-xl-10">
                    <div class="featured-product">
                        <h1>Featured Products</h1>
                        <div class="row">
                            <div class="col-xl-3">
                                <div class="card" style="margin-bottom: 15px;">
                                    <img src="{{ asset('Frontend/assets/images/samsung.jpg') }}" class="card-img-top" alt="">
                                    <div class="card-body" style="text-align: center">
                                        <h5 class="card-title">Samsung</h5>
                                        <p class="card-text">Taka - 5000</p>
                                        <a href="#" class="btn btn-primary">Add to cart</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3">
                                <div class="card" style="margin-bottom: 15px;">
                                    <img src="{{ asset('Frontend/assets/images/samsung.jpg') }}" class="card-img-top" alt="">
                                    <div class="card-body" style="text-align: center">
                                        <h5 class="card-title">Samsung</h5>
                                        <p class="card-text">Taka - 5000</p>
                                        <a href="#" class="btn btn-primary">Add to cart</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3">
                                <div class="card" style="margin-bottom: 15px;">
                                    <img src="{{ asset('Frontend/assets/images/samsung.jpg') }}" class="card-img-top" alt="">
                                    <div class="card-body" style="text-align: center">
                                        <h5 class="card-title">Samsung</h5>
                                        <p class="card-text">Taka - 5000</p>
                                        <a href="#" class="btn btn-primary">Add to cart</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3">
                                <div class="card" style="margin-bottom: 15px;">
                                    <img src="{{ asset('Frontend/assets/images/samsung.jpg') }}" class="card-img-top" alt="">
                                    <div class="card-body" style="text-align: center">
                                        <h5 class="card-title">Samsung</h5>
                                        <p class="card-text">Taka - 5000</p>
                                        <a href="#" class="btn btn-primary">Add to cart</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3">
                                <div class="card" style="margin-bottom: 15px;">
                                    <img src="{{ asset('Frontend/assets/images/samsung.jpg') }}" class="card-img-top" alt="">
                                    <div class="card-body" style="text-align: center">
                                        <h5 class="card-title">Samsung</h5>
                                        <p class="card-text">Taka - 5000</p>
                                        <a href="#" class="btn btn-primary">Add to cart</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3">
                                <div class="card" style="margin-bottom: 15px;">
                                    <img src="{{ asset('Frontend/assets/images/samsung.jpg') }}" class="card-img-top" alt="">
                                    <div class="card-body" style="text-align: center">
                                        <h5 class="card-title">Samsung</h5>
                                        <p class="card-text">Taka - 5000</p>
                                        <a href="#" class="btn btn-primary">Add to cart</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection