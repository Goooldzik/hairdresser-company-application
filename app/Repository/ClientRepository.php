<?php


namespace App\Repository;


use App\Models\Client;

class ClientRepository
{
    /** @var Client  */
    protected Client $client;

    /**
     * ClientRepository constructor.
     * @param Client $client
     */
    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    public function getAll()
    {
        return $this->client->orderBy('name', 'asc')->paginate(20);
    }
}
