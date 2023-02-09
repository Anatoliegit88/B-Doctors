@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <h2>message</h2>

        @foreach ($messages as $message)
            <h2>{{ $message->name }}</h2>
            <p>{{ $message->text }}</p>
            <a class="btn btn-success mt-2" href="{{ route('admin.message.show', $message->id) }} ">vedi messaggio</a>
            <hr>
        @endforeach
    </div>
@endsection
