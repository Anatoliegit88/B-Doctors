@extends('layouts.admin')

@section('content')

<h2 class="text-center mt-3">{{ $profile->name }} {{ $profile->surname }}</h2>
    <div class="container mt-5">

        @if (session('message'))
            <div class=" col-8 mx-auto alert text-dark alert-primary">
                {{ session('message') }}
            </div>
        @endif
            <div class="row">
                <div class="col-6">
                    <img src="{{ $profile->photo }}" alt="">
                </div>
                <div class="col-6">
                    <table class="table table-striped " style="background-color: #d5e9f4;">
                        <tbody>
                            <tr>
                                <td>Email</td>
                                <td>{{ $profile->email }}</p>
                            </tr>

        <div class="row justify-content-center mb-3">

            <div class="bg-doc col-8 d-lg-flex justify-content-around p-3 bd-radius">
                <div class="img-container mx-auto mx-lg-0">
                    <img src="{{ asset('storage/' . $profile->user_detail->photo) }}" alt="">
                </div>
                <div class="info-container mt-3">
                    <div class="text-center text-lg-start">
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


        <div class="row justify-content-center mb-3">

            <div class="col-8 d-flex justify-content-center bg-doc py-3 bd-radius">

                <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 " >
                    @foreach ($profile->specializations as $spec)
                        <div class="col text-center">
                            #{{ $spec->title }}
                        </div>
                    @endforeach

                </div>

            </div>
        </div>


        <div class="row justify-content-center mb-3">
            <div class="col-8 bg-doc p-3 bd-radius">
                <span>
                    {{ $profile->user_detail?->description }}
                </span>
            </div>
        </div>

        <div class="row justify-content-end mb-5">

            <div class="d-flex justify-content-end">
                <a class="btn btn-primary mt-3" href=" {{ route('admin.profiles.edit', auth()->user()->id) }}">edit
                    profile
                </a>
            </div>
        </div>


                            <tr>
                                <td>Address</td>
                                <td>{{ $profile->user_detail?->address }}</p>
                            </tr>

                            <tr>
                                <td>Description</td>
                                <td>{{ $profile->user_detail?->description }}</p>
                            </tr>
                            <tr>
                                <td>
                                    Specializations
                                </td>
                                <td>
                                    <p>
                                        @foreach ($profile->specializations as $item)
                                            <span>{{ $item->title }}</span>
                                        @endforeach
                                    </p>
                                </td>
                            </tr>

                            <tr>
                                <td>Edit Profile</td>
                                <td>
                                    <a class="btn btn-success"
                                        href=" {{ route('admin.profiles.edit', auth()->user()->id) }}">edit
                                        profile</a>
                                </td>
                            </tr>
                        </tbody>

                    </table>
                </div>
            </div>
    </div>
@endsection
