@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Specializations</h2>
        @foreach ($specializations as $specialization)

            <h6> {{ $specialization->title }} </h6>
            
        @endforeach 
    </div>
@endsection
