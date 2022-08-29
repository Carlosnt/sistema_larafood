<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class OrderResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'identify' => $this->identify,
            'total' => $this->total,
            'status' => $this->status,
            'company' => new TenantResource($this->tenant),
            'date' => Carbon::make($this->created_at)->format('Y-m-d'),
            'client' => $this->client_id ? new ClientResource($this->client) : null,
            'table' => $this->table_id ? new TableResource($this->table) : null,
            'products' => ProductResource::collection($this->products),
            'avaluation' => EvaluationResource::collection($this->evaluations)
        ];
    }
}
