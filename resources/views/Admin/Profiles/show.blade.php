@extends('layouts.app')

@section('content')
    <div class="container mt-5">

        <h2>{{ $profile->name }} {{ $profile->surname }}</h2>
        <p>{{ $profile->email }}</p>
        <p>Phone: {{ $profile->user_detail?->phone }}</p>
        <p>Performance: {{ $profile->user_detail?->performance }}</p>
        <p>Address: {{ $profile->user_detail?->address }}</p>
        <p>Description: {{ $profile->user_detail?->description }}</p>
        @foreach ($profile->specializations as $item)
            <p>Specialization: {{ $item->title }}</p>
        @endforeach

        <a class="btn btn-success mt-3" href=" {{ route('admin.profiles.edit', auth()->user()->id) }}">edit profile</a>

    </div>
@endsection
