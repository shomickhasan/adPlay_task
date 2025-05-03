<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TerritoryResource extends JsonResource
{
   
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'territory_name' => $this->t_name,
            'territory_level_name' => $this->territoryLevel?->name ?? null,
            'territory_parent_name' => $this->territorie?->t_name ?? null
        ];
    }
}
