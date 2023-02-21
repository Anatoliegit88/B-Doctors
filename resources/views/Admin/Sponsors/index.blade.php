@extends('layouts.admin')

@section('content')
<h2 class="text-center mt-3">Sponsors</h2>
    <div class="container mt-5">
 

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
                <div class="{{ strToLower($sponsor->title)}} rounded d-flex justify-content-between align-items-center py-3 pe-3 mt-3 col-8 mx-auto">
                    <ul class="no-margin col-8">
                        <li> Title: {{ $sponsor->title }}</li>
                        <li> Description: <br> {{ $sponsor->description }}</li>
                        <li> Price: {{ $sponsor->price }}</li>
                    </ul>
                    <a class="btn btn-primary mt-3" href="{{ route('admin.sponsor.show', $sponsor->id) }}">Buy</a>
                </div>         
        @endforeach


    </div>
@endsection
