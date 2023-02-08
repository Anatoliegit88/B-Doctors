@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Sponsors</h2>

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
