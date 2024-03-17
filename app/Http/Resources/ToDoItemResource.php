<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ToDoItemResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'name' => $this->name,
            'description' => $this->description,
            'status' => $this->status,
            'to_do_id' => $this->to_do_id,
            'id'    => $this->id,
            'created_at' => Carbon::make($this->created_at)->format('d-m-Y'),
        ];
    }
}
