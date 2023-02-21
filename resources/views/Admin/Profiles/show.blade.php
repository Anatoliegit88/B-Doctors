@extends('layouts.admin')

@section('content')
    <div class="container mt-5">

        @if (session('message'))
            <div class=" col-9 mx-auto alert text-dark alert-primary">
                {{ session('message') }}
            </div>
        @endif

        <div class="profile d-flex justify-content-center mt-5 mb-3">
            <div
                class="profile-container d-flex flex-column flex-md-row align-items-center justify-content-around col-11 col-md-9">
                <div class="img-container">
                    <img src="{{ asset('storage/' . $profile->user_detail->photo) }}" alt="">
                </div>
                <div class="info-container mt-3">
                    <div class="text-center text-md-start">
                        <div>
                            <h5> {{ $profile->name }} {{ $profile->surname }}</h5>
                            <span class="doctor-email mb-2">
                                <i class="fa-solid fa-envelope"></i> {{ $profile->email }}
                            </span>
                        </div>

                        <p class="">
                            <i class="fa-solid fa-phone"></i> {{ $profile->user_detail?->phone }}
                        </p>

                        <p>{{ $profile->user_detail?->performance }}</p>

                        <p>
                            <i class="fa-solid fa-house"></i> {{ $profile->user_detail?->address }}
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <div class="spec-container row justify-content-center mb-3">
            <div class="spec col-11 col-md-9 d-flex flex-lg-row flex-column justify-content-center pt-2 pb-2">
                @foreach ($profile->specializations as $spec)
                <div class="me-3">
                    <span class="fw-bold">#</span> {{ $spec->title }}
                </div>
                @endforeach
            </div>
        </div>

        <div class="description-container row justify-content-center">
            <div class="col-11 col-md-9 px-5 doctor-description">
                <span>
                    {{ $profile->user_detail?->description }}
                </span>
            </div>
        </div>

        <div class="row justify-content-end">

            <div class="col-3">
                <a class="btn btn-primary mt-3" href=" {{ route('admin.profiles.edit', auth()->user()->id) }}">edit
                    profile
                </a>
            </div>
        </div>


    </div>
@endsection
