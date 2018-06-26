<?php namespace App\Http\Repositories;

use App\Entities\Documento;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;

class DocumentoRepo extends BaseRepo
{
    protected $favoritoRepo;

    public function getModel()
    {
        return new Documento;
    }

    public function traerEliminados()
    {
        return $this->model->orderBy('deleted_at','DESC')->onlyTrashed()->get();
    }

    public function uploadFile($file)
    {
        //$storagePath  = Storage::disk('local')->getDriver()->getAdapter()->getPathPrefix();
        $nombre = $file->getClientOriginalName();
        $url = Config::get('app.url').'/storage/'.$nombre;
        Storage::disk('local')->put($nombre,  \File::get($file));

        $data['file_path'] = Config::get('app.url');
        $data['file_name'] = $nombre;
        $data['file_type'] = $file->getMimeType();
        $data['url'] = $url;

        return $data;
    }

    public function iClass($documentos)
    {
        $wordMimeTypes = ['text/plain','application/msword','application/vnd.openxmlformats-officedocument.wordprocessingml.document','text/richtext','application/vnd.openxmlformats-officedocument.wordprocessingml.template'];
        foreach($documentos as $documento){
            switch ($documento->file_type){
                case in_array($documento->file_type, $wordMimeTypes):
                    $documento->iClass = 'fa-file-word-o';
                    break;
                case 'application/pdf':
                    $documento->iClass = 'fa-file-pdf-o';
                    break;
                case 'link':
                    $documento->iClass = 'fa-external-link';
                    break;
                default:
                    $documento->iClass = 'fa-file-o';
                    break;
            }
        }
        return $documentos;
    }

    public function listAndPaginate($search = null , $area = null, $categoria = null,  $paginate = 20)
    {

        $documentos = $this->model
            ->orderBy('documentos.lecturas', 'DESC');

        if (is_null($search) || $search == '') {
            // Área
            if (!is_null($area) && $area > 0)
                $documentos->where('area_id', $area);

            //Categoría
            if (!is_null($categoria) && $categoria > 0)
                $documentos->where('categoria_id', $categoria);

        }
        //dd($documentos);
        // Search
        if (!is_null($search) && $search != '') {

            $documentos->select('documentos.*')
                ->where('documentos.descripcion', 'like', "%$search%")
                ->orWhere('documentos.codigo', 'like', "%$search%")
                ->get();

        };


//        if(is_null($search) || $search == ''){
//            if (!is_null($area) && $area > 0)
//                $documentos->where('area_id', $area);
//        }

        return $documentos->paginate($paginate);

    }

    public function favoritoClass($documentos)
    {
        foreach($documentos as $documento){

            $documento->favorito_class = 'fa fa-star-o';

            foreach($documento->favoritos as $favorito){
                if($favorito->user_id == Auth::user()->id)/*Verifica si el documento es favorito del usuario logueado*/
                    $documento->favorito_class = 'fa fa-star';
            }

        }
        return $documentos;
    }

}