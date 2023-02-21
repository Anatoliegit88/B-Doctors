@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header bg-doc">{{ __('Dashboard') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <h4>
                            Welcome Back DR. {{ Auth::user()->name }} {{Auth::user()->surname}}
                        </h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
