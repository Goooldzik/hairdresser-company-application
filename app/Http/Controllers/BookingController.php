<?php

namespace App\Http\Controllers;

use App\Http\Requests\BookingRequest;
use App\Models\Booking;
use App\Models\Hairdresser;
use App\Services\BookingService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;
use Psy\Util\Json;

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
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
