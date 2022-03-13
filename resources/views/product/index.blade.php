@extends('layouts.template')

@section('template_title')
    Productos
@endsection

@section('content')
    <div class="container mt-5 mb-5">

        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif

        <a href="/products/create" class="btn-shop mb-4">Crear Producto</a>
        
        @foreach ($products as $product)
            <div class="card card-anim mb-2 p-3 wrap-message">
                
                <form action="{{ route('products.destroy',$product->id) }}" method="POST">
                    <a class="btn btn-sm btn-primary " href="{{ route('products.show',$product->id) }}"><i class="fa fa-fw fa-eye"></i> Visualizar</a>
                    <a class="btn btn-sm btn-success" href="{{ route('products.edit',$product->id) }}"><i class="fa fa-fw fa-edit"></i> Editar</a>
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> Eliminar</button>
                </form>
            </div>
        @endforeach


       

    </div>
@endsection
