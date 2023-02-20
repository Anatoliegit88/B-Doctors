@extends('layouts.admin')
@section('content')
    <div class="container mt-5">
        <h2>Feedback</h2>


        <table class="table">
            <tr>
                <th scope="col">Reviewer Name</th>
                <th scope="col">Vote</th>
                <th scope="col">Created at</th>
                <th scope="col">Text</th>
            </tr>
            @foreach ($feedback as $review)
                <tr>
                    <th scope="row">{{ $review->reviewer_name }}</th>
                    <td>{{ $review->vote }}</td>
                    <td class="">
                        {{-- <a href=" {{ route('admin.projects.show', $proj->slug) }}" class="btn btn-primary me-1">
                            <i class="fa-regular fa-eye"></i>
                        </a>
                        <a href=" {{ route('admin.projects.edit', $proj->slug) }}" class="btn btn-warning me-1">
                            <i class="fa-solid fa-pen-to-square text-white"></i>
                        </a> --}}

                        {{ $review->created_at }}

                    </td>
                    <td>{{ $review->review }}</td>
                </tr>
            @endforeach
        </table>
    </div>
@endsection
