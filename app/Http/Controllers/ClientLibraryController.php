<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClientLibraryRequest;
use App\Models\Client;
use App\Models\ClientLibrary;
use App\Services\ClientLibraryService;
use Exception;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Psy\Util\Json;

class ClientLibraryController extends Controller
{
    /** @var ClientLibraryService  */
    protected ClientLibraryService $clientLibraryService;

    /**
     * ClientLibraryController constructor.
     * @param ClientLibraryService $clientLibraryService
     */
    public function __construct(ClientLibraryService $clientLibraryService)
    {
        $this->clientLibraryService = $clientLibraryService;
    }

    /**
     * Display a listing of the resource.
     *
     * @param   Client $client
     * @return  View
     */
    public function index(Client $client): View
    {
        return view('libraries.index', [
            'client' => $client
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param   ClientLibraryRequest $request
     * @param   ClientLibrary $clientLibrary
     * @return  JsonResponse
     */
    public function store(ClientLibraryRequest $request, ClientLibrary $clientLibrary): JsonResponse
    {
        return $this->clientLibraryService->store($request, $clientLibrary);
    }

    /**
     * Display the specified resource.
     *
     * @param   ClientLibrary $clientLibrary
     */
    public function show(ClientLibrary $clientLibrary)
    {
        //
    }
}
