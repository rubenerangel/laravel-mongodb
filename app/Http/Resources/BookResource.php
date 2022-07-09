<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class BookResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            '_id'   => $this->id,
            'title' => $this->title,
            'isbn'  => $this->isbn,
            'author'=> $this->author,
            'published' => $this->published,
            'published_at' => $this->published_at->format('d-m-Y')
        ];
    }
}
