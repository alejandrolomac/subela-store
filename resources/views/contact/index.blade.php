@extends('layouts.template')


@section('content')
    <div class="container mt-5 mb-5">

        @foreach ($messages as $contact)
        <div class="card card-anim mb-2 p-3 wrap-message">
            <h4 class="m-0 pb-1">{{ $contact->name }} - {{ $contact->email }}</h4>
            <p class="m-0">{{ $contact->body }}</p>
        </div>
        @endforeach
        
    </div>
@endsection
