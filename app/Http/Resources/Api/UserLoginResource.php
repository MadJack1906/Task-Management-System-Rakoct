<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Auth;

class UserLoginResource extends JsonResource
{


    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "first_name" => $this->first_name,
            "last_name" => $this->last_name,
            "name" => $this->name,
            "email" => $this->email,
            "birthday" => $this->birthday,
        ];
    }
}
