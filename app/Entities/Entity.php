<?php namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class Entity extends Model
{
    public static function getClass()
    {
        return get_class(new static);
    }

    public function getFechaFormateadaAttribute()
    {
        return $this->created_at->format('d-m-Y');
    }

    public function getHoraFormateadaAttribute()
    {
        return $this->created_at->toTimeString();
    }

}