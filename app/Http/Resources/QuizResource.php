<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class QuizResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'desc' => $this->desc,
            'answers' => $this->answers,
            'questions' => QuestionResource::collection($this->whenLoaded('questions')),
            'userId' => $this->user_id,
            'created_at' => $this->created_at->format('d M Y h:i A'),
            'created_at_ago_format' => $this->created_at->diffForHumans()
        ];
    }
}
