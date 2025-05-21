@extends('admin.inc.main')

@section('container')
    <div class="container mt-3">
        <div class="card mb-4">
            <div class="card-header bg-light">
                <h5 class="mb-0">Create Event</h5>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('admin.events.store') }}" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-3">
                        <label class="form-label">Topic</label>
                        <input type="text" class="form-control" name="topic" placeholder="Event Topic" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Price (in Rs.)</label>
                        <input type="number" step="0.01" class="form-control" name="price" placeholder="e.g. 999.00"
                            required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Image</label>
                        <input type="file" class="form-control" name="image">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Content</label>
                        <textarea class="form-control" name="content" rows="3" placeholder="Describe the event" required></textarea>
                    </div>

                    <button type="submit" class="btn btn-primary">Create</button>
                    <button type="reset" class="btn btn-secondary">Reset</button>
                </form>
            </div>
        </div>
    </div>
@endsection
