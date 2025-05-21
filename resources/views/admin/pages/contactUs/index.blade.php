@extends('admin.inc.main')

@section('container')
    <div class="container py-4">
        <h2>Contact Messages</h2>

        @if ($messages->count())
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Subject</th>
                        <th>Message</th>
                        <th>Date</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($messages as $index => $msg)
                        <tr>
                            <td>{{ $index + 1 + ($messages->currentPage() - 1) * $messages->perPage() }}</td>
                            <td>{{ $msg->name }}</td>
                            <td>{{ $msg->email }}</td>
                            <td>{{ $msg->subject }}</td>
                            <td>{{ Str::limit($msg->message, 50) }}</td>
                            <td>{{ $msg->created_at->format('Y-m-d H:i') }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            {{ $messages->links() }}
        @else
            <p>No contact messages found.</p>
        @endif
    </div>
@endsection
