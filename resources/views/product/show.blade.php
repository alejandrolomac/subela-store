@extends('layouts.template')

@section('template_title')
    {{ $product->name ?? 'Show Product' }}
@endsection

@section('content')
    <section class="content container mt-5 mb-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card p-4">
                    <a class="btn-shop" href="{{ route('products.index') }}"> Regresar</a>

                    <div class="card-body m-0 ps-0">

                        <div class="row">
                            <div class="col-12 col-md-5">
                                @if ($product->image)
                                    <img src="{{Storage::disk('s3')->url($product->image)}}" class="card-img-top">
                                @else
                                    <img src="{{ asset('images/default.jpg') }}" />
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
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
