<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserRolePermission extends JsonResource
{
   
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'permission' => PermissionResource::collection($this->permissions),
            'roles_permission' => PermissionResource::collection($this->roles->pluck('permissions')->flatten()->unique()->all()),
        ];
    }
}
