<?php namespace App\Entities;


class Multimedia extends Entity
{
    protected $table = 'multimedia';

    protected $dates = ['created_at', 'updated_at'];

    //Relaciones

    public function noticia()
    {
        return $this->hasOne(Noticia::getClass(), 'id');
    }

    // Accessors
    public function getDirectorioAttribute()
    {
        return $this->created_at->format('Y/m');
    }

    public function getFileAttribute()
    {
        return storage_path('app/multimedia/' . $this->directorio . '/' . $this->nombre);
    }

    public function getRutaSinStorageAttribute()
    {
        return $this->directorio . '/' . $this->nombre;
    }

    public function getBase64Attribute()
    {
        $file = $this->file;
        $content = file_get_contents($file);
        return base64_encode($content);
    }

    public function getBase64SourceAttribute()
    {
        return 'data:' . $this->mime . ';base64, ' . $this->base_64;
    }

}