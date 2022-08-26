<?php

namespace App\Repositories\Contracts;

interface EvaluationRepositoryInterface
{
    public function newEvaluationOrder(int $orderId, int $clientId);
    public function getEvaluationByOrder(int $orderId);
    public function getEvaluationByClient(int $clientId);
}
