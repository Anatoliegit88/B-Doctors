@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        @foreach ( $user as $doc)
            <form action="{{ route('admin.profiles.update', auth()->user()->id) }}" enctype="multipart/form-data" method="POST">
                @csrf
                @method('PUT')

                <div>
                    <label class="form-label" for="name">Name:*</label>
                    <input class="form-control @error('name') is-invalid @enderror" type="text" value="{{ old('name', $doc->name) }}" id="name" name="name" required autocomplete="name" autofocus>

                    @error('name')
                          <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                    @enderror
                </div>

                <div class="mt-3">
                    <label class="form-label" for="surname">Surname:*</label>
                    <input class="form-control @error('surname') is-invalid @enderror" type="text" value="{{ old('surname' ,$doc->surname) }}" id="surname" name="surname" required autocomplete="surname">
                    @error('surname')
                          <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                    @enderror
                </div>

                <div class="mt-3">
                    <label class="form-label" for="email">Email:*</label>
                    <input class="form-control @error('email') is-invalid @enderror" type="email" value="{{ old('email',$doc->email) }}" id="email" name="email" required autocomplete="email">
                    @error('email')
                          <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                    @enderror
                </div>

                <div class="mt-3">
                    <label class="form-label" for="photo">Photo:</label>
                    <input class="form-control" type="file" id="photo" name="photo">
                </div>

                <div class="mt-3">
                    <label class="form-label" for="curriculum">Curriculum:</label>
                    <input class="form-control" type="file" id="curriculum" name="curriculum">
                </div>

                <div class="mt-3">
                    <label class="form-label" for="phone">Phone:</label>
                    <input class="form-control" type="text" value="{{ old('phone' ,$doc->user_detail?->phone) }}" id="phone"
                        name="phone">
                </div>

                <div class="mt-3">
                    <label class="form-label" for="performance">Performance:</label>
                    <input class="form-control" type="text" value="{{ old('performance' , $doc->user_detail?->performance) }}"
                        id="performance" name="performance">
                </div>

                <div class="mt-3">
                    <label class="form-label" for="address">Address:*</label>
                    <input class="form-control @error('address') is-invalid @enderror" type="text" value="{{ old('address' ,$doc->user_detail?->address) }}" id="address"
                        name="address" required autocomplete="address">

                        @error('address')
                        <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                        @enderror

                </div>

                <div class="mt-3">
                    <label class="form-label" for="description">Description:</label>
                    <input class="form-control" type="text" value="{{ old('description',$doc->user_detail?->description) }}"
                        id="description" name="description">
                </div>

                <div class="mt-3">
                    <h6>Specializzationi:*</h6>
                    @foreach ($specializations as $specialization)
                        <label for="specialization-{{ $specialization->id }}">{{ $specialization->title }}</label>
                        <input name="specializations[]" type="checkbox" id="specialization-{{ $specialization->id }}"
                            value="{{ $specialization->id }}" @checked( $doc->specializations->contains($specialization))>
                        <br>
                    @endforeach
                </div>

                <button type="submit-edit" class="btn btn-success mt-4">Save</button>

            </form>
        @endforeach

    </div>
@endsection
