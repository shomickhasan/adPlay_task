<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
   
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'full_name' => $this->full_name,
            'user_name' => $this->user_name,
            'phone' => $this->phone,
            'email' => $this->email,
            'status' => $this->status,
            'roles' => $this?->roles->pluck('name')->first(),
            'department' => $this->departments->d_name ?? null,
            'photo' => config('image.path') .$this->photo,
            'company_name' => $this->company_name,
            'company_address' => $this->company_address,
            'contact_number' => $this->contact_number
         ];
    }
}
