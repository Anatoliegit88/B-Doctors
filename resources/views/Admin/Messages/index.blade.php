@extends('layouts.admin')

@section('content')
    <h2 class="text-center mt-3">Messages</h2>
    <div class="container mt-5">

        {{-- @foreach ($messages as $message)
            <h2>{{ $message->name }}</h2>
            <p>{{ $message->text }}</p>
            <a class="btn btn-success mt-2" href="{{ route('admin.message.show', $message->id) }} ">vedi messaggio</a>
            <hr>
        @endforeach --}}

        <table class="table table-striped " style="background-color: #d5e9f4;">
            <thead>
                <tr>
                    <th scope="col">Sender Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Send at</th>
                    <th scope="col">Text</th>
                    <th scope="col">Info</th>
                </tr>
            </thead>
            <tbody class="table-group-divider">
                @foreach ($messages as $message)
                    <tr>
                        <td>{{ $message->name }}</th>
                        <td>{{ $message->email }}</td>
                        <td> {{ $message->created_at }}</td>
                        <td class="text-truncate" style="max-width: 150px;">{{ $message->text }}</td>
                        <td> <a class="btn btn-success" href="{{ route('admin.message.show', $message->id) }}">Info</a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>

    </div>
@endsection
