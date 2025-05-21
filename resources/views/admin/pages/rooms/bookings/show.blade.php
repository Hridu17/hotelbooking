@extends('admin.inc.main')

@section('container')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold mb-4">Booking Details</h4>

        <div class="card">
            <div class="card-body">
                <p><strong>Name:</strong> {{ $booking->name }}</p>
                <p><strong>Email:</strong> {{ $booking->email }}</p>
                <p><strong>Phone:</strong> {{ $booking->phone }}</p>
                <p><strong>Date:</strong> {{ $booking->date }}</p>
                <p><strong>Time:</strong> {{ $booking->time }}</p>
                <p><strong>People Count:</strong> {{ $booking->people_count }}</p>
                <p><strong>Payment:</strong> Rs. {{ number_format($booking->payment, 2) }}</p>
                <p><strong>Payment Method:</strong> {{ ucfirst($booking->payment_method) }}</p>
                <p><strong>Status:</strong>
                    <span
                        class="badge bg-{{ $booking->status == 'confirmed' ? 'success' : ($booking->status == 'pending' ? 'warning' : 'danger') }}">
                        {{ ucfirst($booking->status) }}
                    </span>
                </p>
                <p><strong>Message:</strong> {{ $booking->message }}</p>

                <form method="POST" action="{{ route('admin.room.bookings.updateStatus', $booking->id) }}" class="mt-4">
                    @csrf
                    <div class="mb-3">
                        <label>Status</label>
                        <select name="status" class="form-select">
                            <option value="pending" {{ $booking->status == 'pending' ? 'selected' : '' }}>Pending</option>
                            <option value="confirmed" {{ $booking->status == 'confirmed' ? 'selected' : '' }}>Confirmed
                            </option>
                            <option value="cancelled" {{ $booking->status == 'cancelled' ? 'selected' : '' }}>Cancelled
                            </option>
                            <option value="failed" {{ $booking->status == 'failed' ? 'selected' : '' }}>Failed</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Update Status</button>
                </form>

                <a href="{{ route('admin.room.bookings') }}" class="btn btn-outline-secondary mt-3">← Back to Bookings</a>
            </div>
        </div>
    </div>
@endsection
