<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SettingResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
           
            'system_name' => $this->system_name,
            'system_slogan1' => $this->system_slogan1,
            'system_slogan2' => $this->system_slogan2,
            'facebook_link' => $this->facebook_link,
            'email_link' => $this->email_link,
            'number' => $this->number,
            'system_logo' => $this->system_logo,
            'background_img' => $this->background_img,

        ];
    }
}
