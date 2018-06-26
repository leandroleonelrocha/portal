<?php

namespace App\Entities;


class Likes extends Entity
{

    protected $fillable = ['user_id', 'objeto_id', 'objeto_type'];
    //Relaciones

    public function likeable()
    {
        return $this->morphTo();
    }

}
