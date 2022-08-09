<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AlunoResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return ['nome'=>$this->nome,
                'email'=>$this->email,
                'data_nascimento'=>$this->data_nascimento,
                'curso_id'=>$this->curso_id    
        ];
    }
}
