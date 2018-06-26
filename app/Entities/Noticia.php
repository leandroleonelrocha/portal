<?php namespace App\Entities;

use Illuminate\Database\Eloquent\SoftDeletes;

class Noticia extends Entity
{
    protected $table = 'noticias';

    protected $fillable = ['titulo', 'epigrafe', 'cuerpo', 'lecturas', 'tags', 'categoria_id', 'multimedia_id', 'image_path', 'image_name', 'image_url', 'fecha_publicacion'];

    use SoftDeletes;
    protected $dates = ['deleted_at'];

    //Relaciones

    public function categoria()
    {
        return $this->belongsTo(Categoria::getClass());
    }

    public function likes()
    {
        return $this->morphMany(Likes::getClass(), 'objeto');
    }

    public function multimedia()
    {
        return $this->belongsTo(Multimedia::getClass(), 'multimedia_id');
    }


    //Accesors
    public function getFechaNoticiaAttribute()
    {
        return date_format($this->created_at,"d/m/Y");
    }

    public function getFechaNoticiaActualizadaAttribute()
    {
        return date_format($this->updated_at,"d/m/Y");
    }

    public function getFechaNoticiaEliminadaAttribute()
    {
       return date_format($this->deleted_at,"d/m/Y");
    }

    public function getTotalNoticiasAttribute()
    {
        return $this->all()->count();
    }

    public function getTotalNoticiasEliminadasAttribute()
    {
        return $this->onlyTrashed()->count();
    }



}
