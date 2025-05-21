@extends('admin.inc.main')

@section('container')
    <div class="container-xxl">
        <h4 class="mb-4">Create Standard Room</h4>

        <form method="POST" action="{{ route('admin.rooms.standard.store') }}" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
                <label class="form-label">Title</label>
                <input type="text" name="title" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Description</label>
                <textarea name="description" class="form-control" rows="4"></textarea>
            </div>

            <div class="mb-3">
                <label class="form-label">Capacity</label>
                <input type="number" name="capacity" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Price</label>
                <input type="number" name="price" step="0.01" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Image</label>
                <input type="file" name="image_path" class="form-control">
            </div>

            <div class="mb-3">
                <label class="form-label">Availability</label>
                <select name="is_available" class="form-select">
                    <option value="1">Available</option>
                    <option value="0">Unavailable</option>
                </select>
            </div>

            <button type="submit" class="btn btn-success">Create Room</button>
        </form>
    </div>
@endsection
