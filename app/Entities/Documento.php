<?php namespace App\Entities;

use Illuminate\Database\Eloquent\SoftDeletes;

class Documento extends Entity
{
    protected $table = 'documentos';
    protected $fillable =
    [
        'descripcion',
        'codigo',
        'area_id',
        'area_nombre',
        'categoria_id',
        'file_path',
        'file_name',
        'file_type',
        'url',
        'lecturas'
    ];

    use SoftDeletes;
    protected $dates = ['deleted_at'];

    //Relaciones

    public function categorias_documentos()
    {
        return $this->belongsTo(CategoriaDocumento::getClass(), 'categoria_id');
    }

    public function favoritos()
    {
        return $this->morphMany(Favorito::getClass(), 'objeto');
    }

    // Mutators
    public function setCodigoAttribute($value)
    {
        $this->attributes['codigo'] = strtoupper($value);
    }

    //Accesors
    public function getFechaDocumentoAttribute()
    {
        return date_format($this->created_at,"d/m/Y");
    }

    public function getFechaDocumentoEliminadoAttribute()
    {
        return date_format($this->deleted_at,"d/m/Y");
    }

    public function getTotalDocumentosAttribute()
    {
        return $this->all()->count();
    }

    public function getTotalDocumentosEliminadosAttribute()
    {
        return $this->onlyTrashed()->count();
    }

}
