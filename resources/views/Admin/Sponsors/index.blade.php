@extends('layouts.admin')

@section('content')
    <div class="container mt-5">
        <h2>Sponsors</h2>

        @if (session('message'))
            <div class="col-6 mx-auto text-center alert alert-danger">
                {{ session('message') }}
            </div>
        @endif

        @if (session()->has('success_message'))
            <div class="col-6 mx-auto text-center alert alert-success">
                {{ session()->get('success_message') }}
            </div>
        @endif

        <ul>
            @foreach ($sponsors as $sponsor)
                <li> Tittolo: {{ $sponsor->title }}</li>
                <li> Descrizzione: <br> {{ $sponsor->description }}</li>
                <li> Prezzo: {{ $sponsor->price }}</li>
                <a class="btn btn-success mt-3" href="{{ route('admin.sponsor.show', $sponsor->id) }}">Info</a>
                <hr>
            @endforeach
        </ul>
    </div>
@endsection
