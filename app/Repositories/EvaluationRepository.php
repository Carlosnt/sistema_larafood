<?php

namespace App\Repositories;

use App\Models\Evaluation;
use App\Repositories\Contracts\EvaluationRepositoryInterface;
use Illuminate\Support\Facades\DB;

/**
 *
 */
class EvaluationRepository implements EvaluationRepositoryInterface
{
    /**
     * @var string
     */
    protected $entity;

    /**
     *
     */
    public function __construct(Evaluation $evaluation)
    {
        $this->entity = $evaluation;
    }

    /**
     * @param int $orderId
     * @param int $clientId
     * @return \Illuminate\Support\Collection
     */
    public function newEvaluationOrder(int $orderId, int $clientId, array $evaluation)
    {
        $data = [
            'client_id' => $clientId,
            'order_id' => $orderId,
            'stars' => $evaluation['stars'],
            'comment' => $evaluation['comment'] ?? null,
        ];

        return $this->entity->create($data);
    }

    /**
     * @param int $orderId
     * @return \Illuminate\Support\Collection
     */
    public function getEvaluationByOrder(int $orderId)
    {
        return $this->entity->where('order_id', $orderId)->get();
    }

    /**
     * @param int $clientId
     * @return \Illuminate\Support\Collection
     */
    public function getEvaluationByClient(int $clientId)
    {
        return $this->entity->where('client_id', $clientId)->get();
    }

    public function getEvaluationById(int $id)
    {
        return $this->entity->find($id);
    }

    public function getEvaluationByClientIdByOrderId(int $orderId, int $clientId)
    {
        return $this->entity
            ->where('client_id', $clientId)
            ->where('order_id', $orderId)
            ->first();
    }
}
