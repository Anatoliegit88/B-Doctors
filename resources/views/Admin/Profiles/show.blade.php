@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        @foreach ($user as $doctor)
            <h2>{{ $doctor->name }} {{ $doctor->surname }}</h2>
            <p>{{ $doctor->email }}</p>
            <p>Phone: {{ $doctor->user_detail?->phone }}</p>
            <p>Performance: {{ $doctor->user_detail?->performance }}</p>
            <p>Address: {{ $doctor->user_detail?->address }}</p>
            <p>Description: {{ $doctor->user_detail?->description }}</p>
            @foreach ($doctor->specializations as $item)
                <p>Specialization: {{ $item->title }}</p>
            @endforeach

            <a class="btn btn-success mt-3" href=" {{route('admin.profiles.edit', auth()->user()->id) }}">edit profile</a>
        @endforeach
    </div>
@endsection
