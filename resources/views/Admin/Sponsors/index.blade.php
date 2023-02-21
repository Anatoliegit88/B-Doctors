@extends('layouts.admin')

@section('content')
    <div class="container mt-5">
        <h2 class="text-center">Sponsors</h2>

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

        @foreach ($sponsors as $sponsor)
        <div>
            <ul>
                <li> Title: {{ $sponsor->title }}</li>
                <li> Description: <br> {{ $sponsor->description }}</li>
                <li> Price: {{ $sponsor->price }}</li>
                <a class="btn btn-success mt-3" href="{{ route('admin.sponsor.show', $sponsor->id) }}">Buy</a>
                <hr>
            </ul>
        </div>
        @endforeach

    </div>
@endsection
