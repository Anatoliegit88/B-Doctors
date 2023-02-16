@extends('layouts.admin')

@section('content')
    <div class="container mt-5">

        @if (session('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
        @endif

        <h2>{{ $profile->name }} {{ $profile->surname }}</h2>
        <p>{{ $profile->email }}</p>
        <p>Phone: {{ $profile->user_detail?->phone }}</p>
        <p>Performance: {{ $profile->user_detail?->performance }}</p>
        <p>Address: {{ $profile->user_detail?->address }}</p>
        <p>Description: {{ $profile->user_detail?->description }}</p>
        <p>Specialization:
            @foreach ($profile->specializations as $item)
                <span class="me-2">{{ $item->title }}</span>
            @endforeach
        </p>

        <a class="btn btn-success mt-3" href=" {{ route('admin.profiles.edit', auth()->user()->id) }}">edit profile</a>

    </div>
@endsection
