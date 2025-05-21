@extends('admin.inc.main')

@section('container')
    @if (Session::has('message'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ Session('message') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="container py-4">
        <a href="{{ route('admin.events.create') }}" class="btn btn-primary my-3">Add</a>

        <table class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                    <th>#</th>
                    <th>Topic</th>
                    <th>Image</th>
                    <th>Price (Rs.)</th>
                    <th>Content</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($events as $event)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $event->topic }}</td>
                        <td>
                            @if ($event->image)
                                <img src="{{ asset('uploads/' . $event->image) }}" alt="Event Image" width="100"
                                    height="100">
                            @else
                                <span>No Image</span>
                            @endif
                        </td>
                        <td>{{ number_format($event->price, 2) }}</td>
                        <td>{{ Str::limit($event->content, 100) }}</td>
                        <td>
                            <a href="{{ route('admin.events.edit', $event->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('admin.events.destroy', $event->id) }}" method="POST"
                                style="display: inline-block;">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm"
                                    onclick="return confirm('Are you sure?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
