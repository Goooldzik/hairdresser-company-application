<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClientRequest;
use App\Http\Requests\ClientUpdateRequest;
use App\Models\Booking;
use App\Models\Client;
use App\Models\ClientLibrary;
use App\Models\Hairdresser;
use App\Services\ClientService;
use Database\Seeders\ClientSeeder;
use Exception;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    /** @var ClientService  */
    protected ClientService $clientService;

    /**
     * ClientController constructor.
     * @param ClientService $clientService
     */
    public function __construct(ClientService $clientService)
    {
        $this->clientService = $clientService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index(): View
    {
        return view('clients.index', [
            'clients' => $this->clientService->getAll()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param   ClientRequest $request
     * @param   Client $client
     * @return  JsonResponse
     */
    public function store(ClientRequest $request, Client $client): JsonResponse
    {
        return $this->clientService->store($request, $client);
    }

    /**
     * Display the specified resource.
     *
     * @param   Client $client
     * @param   Hairdresser $hairdresser
     * @return  View
     */
    public function show(Client $client, Hairdresser $hairdresser): View
    {
        return view('clients.show', [
            'client' => $client,
            'hairdressers' => $hairdresser
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
     * @param   Client $client
     * @param   ClientUpdateRequest $request
     * @return  JsonResponse
     */
    public function update(Client $client, ClientUpdateRequest $request): JsonResponse
    {
        return $this->clientService->update($client, $request);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param   Client $client
     * @return  JsonResponse
     */
    public function destroy(Client $client): JsonResponse
    {
        return $this->clientService->destroy($client);
    }
}
