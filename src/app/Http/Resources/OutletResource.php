<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class OutletResource extends JsonResource
{
    
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'outlet_name' => $this->outlet_name,
            'owner_name' => $this->owner_name,
            'owner_phone' => $this->owner_phone,
            'outlet_address' => $this->outlet_address,
            'owner_address' => $this->owner_address,
            'owner_email' => $this->owner_email,
            'second_contact_person_name' => $this->second_contact_person_name,
            'designation' => $this->designation,
            'second_person_phone' => $this->second_person_phone,
            'outlet_geo_location_lat' => $this->outlet_geo_location_lat,
            'outlet_geo_location_lon' => $this->outlet_geo_location_lon,
            'territories' => new TerritoryResource($this->territories),
            'status' => $this->status,
            'outlet_picture' => config('image.path') .$this->outlet_picture,
            'outlet_owner_picture' => config('image.path') . $this->outlet_owner_picture
        ];
    }
}
