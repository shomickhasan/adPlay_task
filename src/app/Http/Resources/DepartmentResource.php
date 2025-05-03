<?php

namespace App\Http\Resources;

use App\Models\Department;
use App\Models\DepartmentLevel;
use App\Models\Territory;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class DepartmentResource extends JsonResource
{
   
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'department_name' => $this->d_name,
            'department_level_name' => new DepartmentLevel($this->departmentsLevel),
            'department_parent' => new Department($this->departments)
        ];
    }
}
