<?php


namespace App\Services;


use App\Http\Requests\ClientRequest;
use App\Models\Client;
use App\Repository\ClientRepository;
use Exception;

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


    public function store(ClientRequest $request, Client $client)
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
}
