<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Your Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if ($bookings->isEmpty())
                <div class="bg-white p-6 rounded shadow-sm">
                    <p class="text-gray-600">You have no bookings yet.</p>
                </div>
            @else
                @foreach ($bookings as $booking)
                    <div class="bg-white p-6 mb-4 rounded shadow-sm">
                        <h3 class="text-lg font-bold mb-2">Booking on
                            {{ \Carbon\Carbon::parse($booking->date)->format('F d, Y') }}</h3>
                        <p><strong>Name:</strong> {{ $booking->name }}</p>
                        <p><strong>Email:</strong> {{ $booking->email }}</p>
                        <p><strong>Phone:</strong> {{ $booking->phone }}</p>
                        <p><strong>Time:</strong> {{ $booking->time }}</p>
                        <p><strong>Guests:</strong> {{ $booking->people_count }}</p>
                        <p><strong>Payment Method:</strong> {{ ucfirst($booking->payment_method) }}</p>
                        <p><strong>Status:</strong>
                            <span
                                class="text-sm px-2 py-1 rounded 
                                {{ $booking->status === 'confirmed'
                                    ? 'bg-green-100 text-green-700'
                                    : ($booking->status === 'pending'
                                        ? 'bg-yellow-100 text-yellow-700'
                                        : 'bg-red-100 text-red-700') }}">
                                {{ ucfirst($booking->status) }}
                            </span>
                        </p>
                        <p><strong>Message:</strong> {{ $booking->message ?? '—' }}</p>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
</x-app-layout>
