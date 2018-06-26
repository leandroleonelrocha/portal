<?php namespace App\Http\Repositories;

use App\Entities\Noticia;
use App\Entities\Multimedia;
use Illuminate\Support\Facades\Storage;

class NoticiaRepo extends BaseRepo
{

    public function getModel()
    {
        return new Noticia;
    }


    public function allExceptFirst()
    {
        return $this->model->orderBy('created_at', 'DESC')
                           ->skip(1)
                           ->limit(25)
                           ->get()->all();
    }


    public function primeraNoticia()
    {
        return $this->model->orderBy('created_at', 'DESC')->get()->first();
    }


    public function masLeidas()
    {
        return $this->model->orderBy('lecturas', 'DESC')->limit(6)->get();
    }


    public function traerEliminadas()
    {
        return $this->model->orderBy('deleted_at','DESC')->onlyTrashed()->get();
    }


    public function noticiasLeftAndRight(Array $noticias)
    {
        $noticiasLeft = [];
        $noticiasRight = [];
        $column = 'left';
        foreach ($noticias as $noticia) {
            if ($column == 'left') {
                array_push($noticiasLeft, $noticia);
                $column = 'right';
            } else {
                array_push($noticiasRight, $noticia);
                $column = 'left';
            }
        }

        return compact('noticiasLeft', 'noticiasRight');
    }


    public function relatedByTag($tag)
    {
        return $this->model->orderBy('created_at', 'DESC')
                        ->where('tags', 'like', '%'.$tag.'%')
                        ->get()->all();
    }


    public function frequentTags($list = 5)
    {
        $tags = $this->model->get(['tags'])->toArray();
        $tags = array_flatten($tags);
        $tagsJuntas = [];

        foreach($tags as $tag){
            $tArray = explode(',', $tag);
            foreach($tArray as $lastTag){
                array_push($tagsJuntas, $lastTag);
            }
        }

        $tagsJuntas = array_count_values($tagsJuntas);
        arsort($tagsJuntas);
        $orden = array_slice(array_keys($tagsJuntas), 0, $list, true);

        return $orden;
    }


    public function buscador($search = null , $paginate = 10, $filtro = null, $ord)
    {
        $noticias = $this->model
            ->orderBy('noticias.id', $ord);

        if(!is_null($search) && $search != ''){

            $noticias->where(function ($qry) use ($search, $filtro) {
                $qry->where($filtro, 'like', "%$search%")
                    ->orWhere('id', $search);
            });

        };

        return $noticias->paginate($paginate);
    }

    //METODOS MULTIMEDIA =====================================================

    public function fileName($imagen)
    {
        return md5(time() . str_random(2)) . '.' . $imagen->extension;
    }


    public function uploadFile($file)
    {
        $this->rejectFileSize($file);
        $imagen = $this->createImage($file);
        $data['multimedia_id'] = $imagen->id;
        //$data['imagen'] = $imagen;

        return $data;
    }


    public function createImage($file)
    {

        //CREA LA IMAGEN
        $imagen = new Multimedia();
        $imagen->mime = $file->getClientMimeType();
        $imagen->extension = $file->getClientOriginalExtension();
        $imagen->save();

        //NOMBRA LA IMAGEN
        $imagen->nombre = $this->fileName($imagen);
        $imagen->save();

        $ruta = $imagen->directorio;

        //GRABA LA IMAGEN
        if(!Storage::disk('local')->has($ruta))
            Storage::makeDirectory($ruta);

        Storage::disk('local')->put($imagen->ruta_sin_storage,  file_get_contents($file));

        return $imagen;
    }


    public function deleteImage($id)
    {
        $imagen = Multimedia::findOrFail($id);
        Storage::delete($imagen->ruta_sin_storage);
    }


    public function rejectFileSize($file)
    {
        if ($file->getClientSize() == 0)
            return redirect()->back()
                ->withErrors('La foto seleccionada no se puede subir. Seleccione una diferente.')
                ->withInput();

        if ($file->getClientSize() > 2097152)
            return redirect()->back()
                ->withErrors('La foto excede los 2Mb permitidos')
                ->withInput();

    }


    //FIN METODOS MULTIMEDIA =====================================================


}