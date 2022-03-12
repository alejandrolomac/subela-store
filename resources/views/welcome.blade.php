@extends('layouts.template')

@section('content')

    <img src="images/banner.jpg" class="img-fluid banner-home">

    <div class="container">

        <h3 class="title-line mt-5">Productos Destacados</h3>
        
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-3 mt-5 mb-5">        
            @foreach ($products as $product)
            <div class="col">
                <div class="card card-anim" data-bs-toggle="modal" data-bs-target="#productModal{{ $product->id }}">
                    @if ($product->image)
                        <img src="{{Storage::disk('s3')->url($product->image)}}" class="card-img-top">
                    @else
                        <img src="images/default.jpg" />
                    @endif
                    <div class="card-body">
                        <h3 class="price">
                            @if ($product->offer)
                                <strong>{{ $product->offer }}<small>L</small> <del>{{ $product->price }}</del></strong>
                            @else
                                <span>{{ $product->price }}<small>L</small></span>
                            @endif
                        </h3>
                        <h2 class="card-title">{{ $product->title }}</h2>
                        <p>{{ $product->user_id }}</p><!--ELIMINAR------------------------------ -->
                    </div>
                </div>
            </div>
    
            
            <!-- Modal -->
            <div class="modal fade" id="productModal{{ $product->id }}" tabindex="-1" aria-labelledby="producModal" aria-hidden="true">
                <button type="button" class="btn-close" data-bs-dismiss="modal">X</button>
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-12 col-md-5">
                                    @if ($product->image)
                                        <img src="{{Storage::disk('s3')->url($product->image)}}" class="card-img-top">
                                    @else
                                        <img src="images/default.jpg" />
                                    @endif
                                </div>
                                <div class="col-12 col-md-7">
                                    <h2 class="modal-title mb-3">{{ $product->title }}</h2>
                                    <h3 class="price">
                                        @if ($product->offer)
                                            <strong>{{ $product->offer }}<small>L</small> <del>{{ $product->price }}</del></strong>
                                        @else
                                            <span>{{ $product->price }}<small>L</small></span>
                                        @endif
                                    </h3>
                                    <p class="modal-text top-line">{{ $product->description }}</p>
                                    @if ($product->inventory <= 2)
                                        <span class="inventary text-muted top-line">Solo quedan {{ $product->inventory }} en inventario</span>
                                    @endif
                                    <a href="#" class="btn-shop">Comprar</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>  
    </div>

    
@endsection