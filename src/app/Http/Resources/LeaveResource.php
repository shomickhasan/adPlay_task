<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class LeaveResource extends JsonResource
{
    
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'leave_by' => $this?->leaveBy->full_name,
            'leave_type' => $this->leave_type,
            'note' => $this->note,
            'status' => $this->status,
            'start_date' => Carbon::createFromFormat('Y-m-d', $this->start_date)->format('d M y'),
            'end_date' => Carbon::createFromFormat('Y-m-d', $this->end_date)->format('d M y'),
            'created_at' => $this->created_at->format('d M y, h:i A'),
        ];
    }
}
