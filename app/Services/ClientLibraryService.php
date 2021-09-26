<?php


namespace App\Services;


use App\Http\Requests\ClientLibraryRequest;
use App\Models\ClientLibrary;
use Illuminate\Http\JsonResponse;

class ClientLibraryService
{
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
}
