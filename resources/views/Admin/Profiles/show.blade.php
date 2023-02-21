@extends('layouts.admin')

@section('content')

<h2 class="text-center mt-3">{{ $profile->name }} {{ $profile->surname }}</h2>
    <div class="container mt-5">

        @if (session('message'))
            <div class="alert alert-success">
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

                            <tr>
                                <td>Phone</td>
                                <td>{{ $profile->user_detail?->phone }}</p>
                            </tr>

                            <tr>
                            <td>Performance</td>
                            <td>{{ $profile->user_detail?->performance }}</p>
                            </tr>

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
