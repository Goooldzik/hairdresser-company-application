<?php

namespace App\Http\Controllers;

use App\Http\Requests\HairdresserRequest;
use App\Models\Hairdresser;
use App\Models\User;
use App\Services\HairdresserService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
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
            'hairdressers' => $this->hairdresserService->getAll(),
            'users' => User::all()
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
     * @param   HairdresserRequest $request
     * @param   Hairdresser $hairdresser
     * @return  JsonResponse
     */
    public function store(HairdresserRequest $request, Hairdresser $hairdresser): JsonResponse
    {
        return $this->hairdresserService->store($request, $hairdresser);
    }

    /**
     * Display the specified resource.
     *
     * @param   Hairdresser $hairdresser
     * @return  View
     */
    public function show(Hairdresser $hairdresser): View
    {
        return view('hairdressers.show', [
            'hairdresser' => $hairdresser
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
