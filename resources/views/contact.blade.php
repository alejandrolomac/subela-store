@extends('layouts.template')

@section('content')

<div class="container mt-5 mb-5">
    @if(session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
    <div class="card wrap-contact">
        <h3 class="text-center mt-4">Contáctanos</h3>
        <div class="card-body">
            <form name="contactform" id="contactform" method="post" action="{{url('/contact-form')}}">
            @csrf
                <div class="form-group">
                    <label for="name">Nombre</label>
                    <input type="text" id="name" name="name" class="form-control" required="">
                    <label for="email">E-Mail</label>
                    <input type="text" id="email" name="email" class="form-control" required="">
                </div>
                <div class="form-group">
                    <label for="body">Mensaje</label>
                    <textarea name="body" class="form-control" required=""></textarea>
                </div>
                <button type="submit" class="btn-shop">Enviar</button>
            </form>
        </div>
    </div>
</div> 

@endsection