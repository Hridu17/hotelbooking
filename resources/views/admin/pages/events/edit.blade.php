@extends('admin.inc.main')

@section('container')
    <div class="container mt-3">
        <div class="card mb-4">
            <div class="card-header bg-light">
                <h5 class="mb-0">Edit Event</h5>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('admin.events.update', $event->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label class="form-label">Topic</label>
                        <input type="text" class="form-control" name="topic" value="{{ $event->topic }}" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Price (in Rs.)</label>
                        <input type="number" step="0.01" class="form-control" name="price" value="{{ $event->price }}"
                            required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Current Image</label><br>
                        @if ($event->image)
                            <img src="{{ asset('uploads/' . $event->image) }}" alt="Current Image" width="100">
                        @else
                            <p>No image uploaded</p>
                        @endif
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Change Image (optional)</label>
                        <input type="file" class="form-control" name="image">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Content</label>
                        <textarea class="form-control" name="content" rows="3" required>{{ $event->content }}</textarea>
                    </div>

                    <button type="submit" class="btn btn-success">Update</button>
                    <a href="{{ route('admin.events.index') }}" class="btn btn-secondary">Cancel</a>
                </form>
            </div>
        </div>
    </div>
@endsection
