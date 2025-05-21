@extends('admin.inc.main')

@section('container')
    <div class="container-xxl">
        <h4 class="mb-4">Edit Standard Room</h4>

        <form method="POST" action="{{ route('admin.rooms.family.update', $room->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label class="form-label">Title</label>
                <input type="text" name="title" class="form-control" value="{{ $room->title }}" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Description</label>
                <textarea name="description" class="form-control" rows="4">{{ $room->description }}</textarea>
            </div>

            <div class="mb-3">
                <label class="form-label">Capacity</label>
                <input type="number" name="capacity" class="form-control" value="{{ $room->capacity }}" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Price</label>
                <input type="number" name="price" step="0.01" class="form-control" value="{{ $room->price }}"
                    required>
            </div>

            <div class="mb-3">
                <label class="form-label">Image</label><br>
                @if ($room->image_path)
                    <img src="{{ asset('storage/' . $room->image_path) }}" width="100" class="mb-2"><br>
                @endif
                <input type="file" name="image_path" class="form-control">
            </div>

            <div class="mb-3">
                <label class="form-label">Availability</label>
                <select name="is_available" class="form-select">
                    <option value="1" {{ $room->is_available ? 'selected' : '' }}>Available</option>
                    <option value="0" {{ !$room->is_available ? 'selected' : '' }}>Unavailable</option>
                </select>
            </div>

            <button type="submit" class="btn btn-success">Update Room</button>
        </form>
    </div>
@endsection
