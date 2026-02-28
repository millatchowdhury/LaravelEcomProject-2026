@extends('Frontend.layout.master')

@section('content')

<div class="main-content-area">
        <div class="container">
            <div class="row">
                <div class="col-xl-2">
                    @include('Frontend.partials.sidebar')
                </div>
                <div class="col-xl-10">
                    <div class="widget">
                        <h3>Searched Products For - 
                            <span class="badge text-bg-primary">
                                {{ $search }}
                            </span>
                        </h3>
                        @include('Frontend.pages.product.partials.all_products')
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection