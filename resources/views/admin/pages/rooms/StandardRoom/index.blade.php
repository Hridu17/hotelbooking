@extends('admin.inc.main')

@section('container')
    <div class="container mt-3">
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <div class="d-flex justify-content-between align-items-center mb-3">
            <h3>Standard Rooms</h3>
            <a href="{{ route('admin.rooms.standard.create') }}" class="btn btn-primary">+ Add Standard Room</a>
        </div>

        <table class="table table-bordered table-hover">
            <thead class="table-light">
                <tr>
                    <th>Title</th>
                    <th>Capacity</th>
                    <th>Price</th>
                    <th>Status</th>
                    <th>Image</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($standardRooms as $room)
                    <tr>
                        <td>{{ $room->title }}</td>
                        <td>{{ $room->capacity }}</td>
                        <td>Rs. {{ number_format($room->price, 2) }}</td>
                        <td>
                            @if ($room->is_available)
                                <span class="badge bg-success">Available</span>
                            @else
                                <span class="badge bg-secondary">Unavailable</span>
                            @endif
                        </td>
                        <td>
                            @if ($room->image_path)
                                <img src="{{ asset('storage/' . $room->image_path) }}" width="100" height="100"
                                    alt="Room Image">
                            @else
                                <span class="text-muted">No image</span>
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('admin.rooms.standard.edit', $room->id) }}"
                                class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('admin.rooms.standard.destroy', $room->id) }}" method="POST"
                                class="d-inline" onsubmit="return confirm('Are you sure?')">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
