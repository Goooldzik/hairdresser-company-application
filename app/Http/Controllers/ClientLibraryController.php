<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClientLibraryRequest;
use App\Models\Client;
use App\Models\ClientLibrary;
use Exception;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Psy\Util\Json;

class ClientLibraryController extends Controller
{
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
     * Show the form for creating a new resource.
     *
     */
    public function create()
    {
        //
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
        try {

            $clientLibrary->insert($request->validated());

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

    /**
     * Display the specified resource.
     *
     * @param   int  $id
     */
    public function show(int $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param   int  $id
     */
    public function edit(int $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param   Request $request
     * @param   int  $id
     */
    public function update(Request $request, int $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param   int $id
     */
    public function destroy(int $id)
    {
        //
    }
}
