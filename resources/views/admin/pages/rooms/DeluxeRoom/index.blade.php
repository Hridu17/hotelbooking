@extends('admin.inc.main')

@section('container')
    <div class="container-xxl">
        <h4 class="mb-3">Deluxe Rooms</h4>
        <a href="{{ route('admin.rooms.deluxe.create') }}" class="btn btn-primary mb-3">+ Add Deluxe Room</a>

        <table class="table table-bordered">
            <thead>
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
                @foreach ($deluxeRooms as $room)
                    <tr>
                        <td>{{ $room->title }}</td>
                        <td>{{ $room->capacity }}</td>
                        <td>{{ $room->price }}</td>
                        <td>
                            @if ($room->is_available)
                                <span class="badge bg-success">Available</span>
                            @else
                                <span class="badge bg-danger">Unavailable</span>
                            @endif
                        </td>
                        <td>
                            @if ($room->image_path)
                                <img src="{{ asset('storage/' . $room->image_path) }}" width="60">
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('admin.rooms.deluxe.edit', $room->id) }}"
                                class="btn btn-sm btn-warning">Edit</a>
                            <form method="POST" action="{{ route('admin.rooms.deluxe.destroy', $room->id) }}"
                                class="d-inline">
                                @csrf @method('DELETE')
                                <button onclick="return confirm('Delete this room?')"
                                    class="btn btn-sm btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
