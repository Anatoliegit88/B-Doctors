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
            @if ($sponsor->title == 'Silver')
                <div class="bg-silv rounded d-flex justify-content-between align-items-center pt-3 pb-3 pe-3 mt-3">
                    <ul class="no-margin">
                        <li> Title: {{ $sponsor->title }}</li>
                        <li> Description: <br> {{ $sponsor->description }}</li>
                        <li> Price: {{ $sponsor->price }}</li>
                    </ul>
                    <a class="btn btn-success mt-3" href="{{ route('admin.sponsor.show', $sponsor->id) }}">Buy</a>
                </div>
            @endif
            @if ($sponsor->title == 'Gold')
                <div class="bg-gold rounded d-flex justify-content-between align-items-center pt-3 pb-3 pe-3 mt-3">
                    <ul class="no-margin">
                        <li> Title: {{ $sponsor->title }}</li>
                        <li> Description: <br> {{ $sponsor->description }}</li>
                        <li> Price: {{ $sponsor->price }}</li>
                    </ul>
                    <a class="btn btn-success mt-3" href="{{ route('admin.sponsor.show', $sponsor->id) }}">Buy</a>
                </div>
            @endif
            @if ($sponsor->title == 'Platinum')
                <div class="bg-platinum rounded d-flex justify-content-between align-items-center pt-3 pb-3 pe-3 mt-3">
                    <ul class="no-margin">
                        <li> Title: {{ $sponsor->title }}</li>
                        <li> Description: <br> {{ $sponsor->description }}</li>
                        <li> Price: {{ $sponsor->price }}</li>
                    </ul>
                    <a class="btn btn-success mt-3" href="{{ route('admin.sponsor.show', $sponsor->id) }}">Buy</a>
                </div>
            @endif
        @endforeach


    </div>
@endsection
