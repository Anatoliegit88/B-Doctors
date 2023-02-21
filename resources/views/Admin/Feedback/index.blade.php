@extends('layouts.admin')
@section('content')
    <div class="container mt-5">
        <h2 class="text-center">Feedback</h2>


        <table class="table table-striped " style="background-color: #d5e9f4;">
            <thead>
            <tr>
                <th scope="col">Reviewer Name</th>
                <th scope="col">Vote</th>
                <th scope="col">Created at</th>
                <th scope="col">Text</th>
                <th scope="col">Info</th>

            </tr>
        </thead>
        <tbody  class="table-group-divider">
            @foreach ($feedback as $review)
                <tr>
                    <td>{{ $review->reviewer_name }}</th>
                    <td>{{ $review->vote }}</td>
                    <td class="">  {{ $review->created_at }}</td>
                    <td class="text-truncate" style="max-width: 150px;">{{ $review->review }}</td>
                    <td> <a class="btn btn-success" href="{{ route('admin.feedback.show', $review->id) }}">Info</a></td>
                </tr>
            @endforeach
        </tbody>
        </table>
    </div>
@endsection
