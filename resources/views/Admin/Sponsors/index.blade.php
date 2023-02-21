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
                <div class="{{ strToLower($sponsor->title)}} rounded d-flex justify-content-between align-items-center py-3 px-5 mt-3 col-8 mx-auto">
                    <div class="col-8">
                        <h2> {{ $sponsor->title }}</h2>
                        @if ($sponsor->id === 1)
                        <h6 class="mb-3">24 hours of sponrship!</h6>
                        @elseif ($sponsor->id === 2)
                        <h6 class="mb-3">72 hours of sponrship!</h6>
                        @else
                        <h6 class="mb-3">144 hours of sponrship!</h6>
                        @endif
                        <p>{{ $sponsor->description }}</p>
                        <p> 
                            Price: 
                            <span class="fw-bold">
                                ${{ $sponsor->price }}
                            </span>
                        </p>
                    </div>
                    <a class="btn btn-primary mt-3" href="{{ route('admin.sponsor.show', $sponsor->id) }}">Buy</a>
                </div>         
        @endforeach


    </div>
@endsection
