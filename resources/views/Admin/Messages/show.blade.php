@extends('layouts.admin')

@section('content')
    <div class="container mt-4">
        <h5>{{ $message->name }} <span class="message-email">( {{ $message->email }} )</span> </h5>
        <p>{{ $message->text }}</p>
        <p>{{ $message->created_at }}</p>
    </div>
@endsection
