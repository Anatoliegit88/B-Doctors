@extends('layouts.app')

@section('content')
<div class="container mt-5">
    @foreach ($user as $doc)
        
    @endforeach
    <h2>Edit Profile {{ $doc->name }}</h2>
</div>
@endsection
