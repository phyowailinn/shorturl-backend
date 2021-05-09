<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Url extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $shortUrl = config('app.frontend_url') . "/{$this->short_code}";

        return [
            'id'          => $this->id,
            'short_code'  => $this->short_code,
            'url'         => $this->full_url,
            'short_url'   => $shortUrl,
            'counter'     => $this->counter,
            'expiry'  => $this->expiry,
        ];
    }
}
