@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-between vh-100">

            <div class="col-md-2 v-100 bg-info pt-5">
                <nav>
                    <ul>
                        <li><a class="text-white text-decoration-none fw-bold"
                                href="{{ route('admin.profiles.show', auth()->user()->id) }}"> Profile </a></li>
                        <li><a class="text-white text-decoration-none fw-bold"
                                href="{{ route('admin.sponsor') }}">sponsors</a></li>
                        <li><a class="text-white text-decoration-none fw-bold"
                                href="{{ route('admin.specialization') }}">Specialization</a></li>
                        <li><a class="text-white text-decoration-none fw-bold"
                                href="{{ route('admin.message') }}">message</a></li>
                        <li><a class="text-white text-decoration-none fw-bold"
                                href="{{ route('admin.feedback') }}">feedback</a></li>
                    </ul>
                </nav>
            </div>

            <div class="col-md-8 pt-5">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">{{ __('Dashboard') }}</div>

                        <div class="card-body">
                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif

                            <p>
                                {{ __('You are logged in!') }}
                            </p>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
