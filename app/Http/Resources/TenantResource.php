<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class TenantResource extends JsonResource
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
            'company' => $this->company,
            'image' => $this->logo ? url("storage/{$this->logo}") : "",
            'uuid' => $this->uuid,
            'flag' => $this->url,
            'contact' => $this->email,
            'date_created' => Carbon::parse($this->created_at)->format('d/m/Y'),
        ];
    }
}