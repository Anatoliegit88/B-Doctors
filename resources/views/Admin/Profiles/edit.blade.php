@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        @foreach ($user as $doc)
            <form action="{{ route('admin.profiles.update', auth()->user()->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div>
                    <label class="form-label" for="name">Name:</label>
                    <input class="form-control" type="text" value="{{ $doc->name }}" id="name" name="name">
                </div>

                <div class="mt-3">
                    <label class="form-label" for="surname">Surname:</label>
                    <input class="form-control" type="text" value="{{ $doc->surname }}" id="surname" name="surname">
                </div>

                <div class="mt-3">
                    <label class="form-label" for="email">Email:</label>
                    <input class="form-control" type="email" value="{{ $doc->email }}" id="email" name="email">
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
                    <input class="form-control" type="text" value="{{ $doc->user_detail?->phone }}" id="phone"
                        name="phone">
                </div>

                <div class="mt-3">
                    <label class="form-label" for="performance">Performance:</label>
                    <input class="form-control" type="text" value="{{ $doc->user_detail?->performance }}"
                        id="performance" name="performance">
                </div>

                <div class="mt-3">
                    <label class="form-label" for="address">Address:</label>
                    <input class="form-control" type="text" value="{{ $doc->user_detail?->address }}" id="address"
                        name="address">
                </div>

                <div class="mt-3">
                    <label class="form-label" for="description">Description:</label>
                    <input class="form-control" type="text" value="{{ $doc->user_detail?->description }}"
                        id="description" name="description">
                </div>

                <div class="mt-3">
                    @foreach ($specializations as $specialization)
                        <label for="specialization-{{ $specialization->id }}">{{ $specialization->title }}</label>
                        <input name="specialization[]" type="checkbox" id="specialization-{{ $specialization->id }}"
                            value="{{ $specialization->id }}" @checked($doc->specializations->contains($specialization))>
                        <br>
                    @endforeach
                </div>

                <button type="submit" class="btn btn-success mt-4">Save</button>

            </form>
        @endforeach

    </div>
@endsection
