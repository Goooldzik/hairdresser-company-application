<?php

namespace App\Http\Controllers;

use App\Services\HairdresserService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class HairdresserController extends Controller
{
    /** @var HairdresserService  */
    protected HairdresserService $hairdresserService;

    /**
     * HairdresserController constructor.
     * @param HairdresserService $hairdresserService
     */
    public function __construct(HairdresserService $hairdresserService)
    {
        $this->hairdresserService = $hairdresserService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index(): View
    {
        return view('hairdressers.index', [
            'hairdressers' => $this->hairdresserService->getAll()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
