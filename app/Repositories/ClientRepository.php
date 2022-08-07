<?php

namespace App\Repositories;

use App\Models\Client;
use App\Repositories\Contracts\ClientRepositoryInterface;
use Illuminate\Support\Facades\DB;

/**
 *
 */
class ClientRepository implements ClientRepositoryInterface
{
    /**
     * @var string
     */
    protected $entity;

    /**
     *
     */
    public function __construct(Client $client)
    {
        $this->entity = $client;
    }

    /**
     * @param string $uuid
     * @return \Illuminate\Support\Collection
     */
    public function createNewClient(array $data)
    {
        $data['password'] = bcrypt($data['password']);
        return $this->entity->create($data);

    }

    /**
     * @param int $tenant_id
     * @return \Illuminate\Support\Collection
     */
    public function getClient(int $id)
    {


    }

}
