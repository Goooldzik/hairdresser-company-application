<?php

namespace App\Http\Controllers;

use App\Http\Requests\BookingRequest;
use App\Models\Booking;
use App\Services\BookingService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    /** @var BookingService  */
    protected BookingService $bookingService;

    /**
     * BookingController constructor.
     * @param BookingService $bookingService
     */
    public function __construct(BookingService $bookingService)
    {
        $this->bookingService = $bookingService;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param   BookingRequest  $request
     * @param   Booking $booking
     * @return  JsonResponse
     */
    public function store(BookingRequest $request, Booking $booking): JsonResponse
    {
        return $this->bookingService->store($request, $booking);
    }

    /**
     * Display the specified resource.
     *
     * @param   Booking $booking
     * @return  View
     */
    public function show(Booking $booking): View
    {
        return view('bookings.show', [
            'booking' => $booking
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param   Booking $booking
     * @return  JsonResponse
     */
    public function update(Booking $booking): JsonResponse
    {
        return $this->bookingService->update($booking);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param   Booking $booking
     * @return  JsonResponse
     */
    public function destroy(Booking $booking): JsonResponse
    {
        return $this->bookingService->destroy($booking);
    }
}
