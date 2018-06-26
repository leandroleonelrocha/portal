<?php

namespace App\Entities;


class Favorito extends Entity
{

    protected $fillable = ['user_id', 'objeto_id', 'objeto_type'];
    //Relaciones

    public function favoritable()
    {
        return $this->morphTo();
    }

}
