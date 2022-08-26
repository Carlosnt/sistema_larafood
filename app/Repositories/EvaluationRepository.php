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
    public function newEvaluationOrder(int $orderId, int $clientId)
    {

    }

    /**
     * @param int $orderId
     * @return \Illuminate\Support\Collection
     */
    public function getEvaluationByOrder(int $orderId)
    {

    }

    /**
     * @param int $clientId
     * @return \Illuminate\Support\Collection
     */
    public function getEvaluationByClient(int $clientId)
    {

    }

}
