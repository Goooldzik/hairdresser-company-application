<?php


namespace App\Services;


use App\Http\Requests\BookingRequest;
use App\Models\Booking;
use Exception;
use Illuminate\Http\JsonResponse;

class BookingService
{
    /**
     * @param   BookingRequest $request
     * @param   Booking $booking
     * @return  JsonResponse
     */
    public function store(BookingRequest $request, Booking $booking): JsonResponse
    {
        try {

            $booking->insert($request->validated());

            return response()->json([
                'status' => 'success'
            ]);

        } catch (Exception $error) {
            return response()->json([
                'status' => 'error',
                'message' => $error->getMessage()
            ]);
        }
    }
}
