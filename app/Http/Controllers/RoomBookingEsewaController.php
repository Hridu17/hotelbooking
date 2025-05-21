<?php

namespace App\Http\Controllers;

use App\Models\RoomBooking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Xentixar\EsewaSdk\Esewa;

class RoomBookingEsewaController extends Controller
{
    public function pay(Request $request)
    {
        $validated = $request->validate([
            'name'         => 'required|string|max:255',
            'email'        => 'required|email',
            'phone'        => 'required|string|max:20',
            'date'         => 'required|date',
            'time'         => 'required',
            'people'       => 'required|integer|min:1',
            'payment'      => 'required|numeric',
            'message'      => 'nullable|string',
        ]);

        // Fix: convert 'people' => 'people_count' as expected by DB
        $validated['people_count'] = $validated['people'];
        unset($validated['people']);

        $validated['payment_method'] = 'eSewa';
        $validated['status'] = 'pending';

        $booking = RoomBooking::create($validated);

        $transaction_uuid = strtoupper(bin2hex(random_bytes(10)));
        $amount = $validated['payment'];

        $esewa = new \Xentixar\EsewaSdk\Esewa();
        $esewa->config(
            route('booking.esewa.check', $booking->id),
            route('booking.esewa.check', $booking->id),
            $amount,
            $transaction_uuid
        );

        return $esewa->init(); // Ensure this is returned!
    }

    public function check(Request $request, $id)
    {
        // Simulating eSewa response parsing
        $encodedData = $request->input('data');
        $decodedData = json_decode(base64_decode($encodedData), true);

        // Example structure check (adjust as needed)
        if ($decodedData && $decodedData["status"] === 'COMPLETE') {
            $booking = RoomBooking::findOrFail($id);
            $booking->status = 'confirmed';
            $booking->payment = $decodedData['total_amount']; // ← Save actual amount
            $booking->save();

            return view('hotel.payment-success', [
                'booking' => $booking,
                'transaction_code' => $decodedData['transaction_code'],
                'amount' => $decodedData['total_amount'],
            ]);
        }



        // If payment not complete
        $booking = RoomBooking::findOrFail($id);
        $booking->status = 'failed';
        $booking->save();

        return redirect()->route('booking.payment.failed')
            ->with('error', 'Payment failed, please try again.');
    }

    public function paymentFailed()
    {
        $errorMessage = session('error', 'Payment failed due to an unknown error.');
        return view('hotel.payment-failed', compact('errorMessage'));
    }
}
