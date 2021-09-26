<?php


namespace App\Services;


use App\Http\Requests\ClientRequest;
use App\Http\Requests\ClientUpdateRequest;
use App\Models\Booking;
use App\Models\Client;
use App\Models\ClientLibrary;
use App\Repository\ClientRepository;
use Exception;
use Illuminate\Http\JsonResponse;

class ClientService
{
    /** @var ClientRepository  */
    protected ClientRepository $clientRepository;

    /**
     * ClientService constructor.
     * @param ClientRepository $clientRepository
     */
    public function __construct(ClientRepository $clientRepository)
    {
        $this->clientRepository = $clientRepository;
    }

    public function getAll()
    {
        return $this->clientRepository->getAll();
    }

    /**
     * @param   ClientRequest $request
     * @param   Client $client
     * @return  JsonResponse
     */
    public function store(ClientRequest $request, Client $client): JsonResponse
    {
        if(!is_null($client->where('client_library_number', $request->get('client_library_number'))->first())) {
            return response()->json([
                'status' => 'error',
                'message' => 'Client with same library number exist'
            ]);
            //throw new Exception('Client with same library number exist');
        }

        try {
            $client->insert($request->validated());

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
     * @param   Client $client
     * @return  JsonResponse
     */
    public function destroy(Client $client): JsonResponse
    {
        try {

            $client->bookings()->delete();
            $client->library()->delete();
            $client->delete();

            return response()->json([
                'status' => 'success'
            ]);

        } catch (Exception $error) {
            return response()->json([
                'status' => 'error',
                'message' => $error->getMessage()
            ])->setStatusCode(500);
        }
    }

    /**
     * @param   Client $client
     * @param   ClientUpdateRequest $request
     * @return  JsonResponse
     */
    public function update(Client $client, ClientUpdateRequest $request): JsonResponse
    {
        try {

            $client->update($request->validated());

            return response()->json([
                'status' => 'success'
            ]);

        } catch (Exception $error) {
            return response()->json([
                'status' => 'error',
                'message' => $error->getMessage()
            ])->setStatusCode(500);
        }
    }
}
