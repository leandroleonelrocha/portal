<?php namespace App\Http\Controllers;

use App\Entities\Noticia;
use App\Entities\Multimedia;
use App\Http\Repositories\NavbarRepo;
use App\Http\Repositories\NoticiaRepo;
use App\Http\Repositories\CategoriaRepo;
use Illuminate\Http\Request;
use App\Http\Requests\CreateNoticiaRequest;
use Illuminate\Routing\Route;
use Alert;

class NoticiasController extends Controller
{
    protected $noticiaRepo;
    protected $categoriaRepo;
    protected $navbarRepo;

    public function __construct(NoticiaRepo $noticiaRepo, CategoriaRepo $categoriaRepo, NavbarRepo $navbarRepo)
    {
        $this->noticiaRepo = $noticiaRepo;
        $this->categoriaRepo = $categoriaRepo;
        $this->navbarRepo = $navbarRepo;
    }


    public function index($orden='down', $param = 'fecha')
    {
        $ord = ($orden == 'up') ? 'ASC' : 'DESC';
        $param = ($param == 'fecha') ? 'created_at' : $param;

        $data['navbar'] = $this->navbarRepo->navbar();
        $data['noticias'] = Noticia::orderBy($param, $ord)->paginate(10);
        $data['noticias']->orden = $orden;
        $data['noticias']->param = $param;
        $data['eliminadas'] = $this->noticiaRepo->traerEliminadas();
        $data['categorias'] = $this->categoriaRepo->listAll()->toArray();

        return view('noticias.noticiasIndex')->with($data);
    }


    public function verNoticia($id)
    {
        $noticia = $this->noticiaRepo->evenIfTrashed($id);
        $navbar = $this->navbarRepo->navbar();

        //Visualización sin sumar lectura
        if($noticia->deleted_at != null)
            return view('noticias.verNoticia', compact('noticia'));

        //Visualización sumando lectura
        $lecturas = $noticia->lecturas + 1;
        $this->noticiaRepo->edit($noticia, ['lecturas' => $lecturas]);

        return view('noticias.verNoticia', compact('noticia', 'navbar'));
    }


    public function relacionadas($tag)
    {
        $noticias = $this->noticiaRepo->relatedByTag($tag);
        $navbar = $this->navbarRepo->navbar();

        $n = $this->noticiaRepo->noticiasLeftAndRight($noticias);
        $noticiasLeft = $n['noticiasLeft'];
        $noticiasRight = $n['noticiasRight'];

        return view('noticias.relacionadas', compact('noticias', 'noticiasLeft', 'noticiasRight', 'tag', 'navbar'));

    }


    public function buscar(Request $request, $orden='down')
    {
        $navbar = $this->navbarRepo->navbar();
        $ord = ($orden == 'up') ? 'ASC' : 'DESC';

        $noticias = $this->noticiaRepo->buscador($search = $request->search, null, $filtro = $request->filtro, $ord);
        $noticias->busqueda = true;
        $noticias->orden = $orden;
        $eliminadas = $this->noticiaRepo->traerEliminadas();

        return view('noticias.noticiasIndex', compact('noticias', 'eliminadas', 'navbar'));
    }


    public function createForm()
    {
        $data['navbar'] = $this->navbarRepo->navbar();
        $data['categorias'] = $this->categoriaRepo->listAll();
        $data['tags'] = $this->noticiaRepo->frequentTags();

        return view('noticias.partials.createForm')->with($data);
    }


    public function crearNoticia(CreateNoticiaRequest $request)
    {
        $data = $request->only(['categoria_id', 'titulo', 'epigrafe', 'cuerpo', 'tags']);

        if($request->file('foto_portada') )
            $data += $this->noticiaRepo->uploadFile($request->file('foto_portada'));

        if($data['tags'] != null)
            $data['tags'] = implode(",", $data['tags']);

        $this->noticiaRepo->create($data);
        $lastIdInserted = $this->noticiaRepo->primeraNoticia()->id;

        return redirect()->route('noticias.verNoticia', [$lastIdInserted])->with('msgOk','Noticia subida con éxito.');

    }


    public function destroy($id)
    {
        $noticia = $this->noticiaRepo->evenIfTrashed($id);

        if($noticia->deleted_at == null){//Soft delete
            $noticia->delete();
            Alert::message('Noticia enviada a papelera de reciclaje!');
            return redirect()->back()->with('msgOk', 'La noticia ha sido enviada a la papelerea de reciclaje.');
        }

        if($noticia->multimedia_id != null){

            $this->noticiaRepo->deleteImage($noticia->multimedia_id);
            $noticia->likes()->delete();
            $noticia->multimedia()->delete();
            $noticia->forceDelete();

            return redirect()->back()->with('msgOk', 'Noticia eliminada con éxito.');
        }

        $noticia->likes()->delete();
        $noticia->multimedia()->delete();
        $noticia->forceDelete();

        return redirect()->back()->with('msgOk', 'Noticia eliminada con éxito.');

    }


    public function eliminarTodas()
    {
        $noticias = $this->noticiaRepo->traerEliminadas();

        foreach($noticias as $noticia){
            if($noticia->multimedia_id != null)
                $this->noticiaRepo->deleteImage($noticia->multimedia_id);

            $noticia->likes()->delete();
            $noticia->multimedia()->delete();
            $noticia->forceDelete();
        }

        return redirect()->back()->with('msgOk', 'Han sido eliminadas todas las noticias con éxito.');
    }


    public function show(Route $route)
    {
        $data['navbar'] = $this->navbarRepo->all();
        $data['noticia'] = $this->noticiaRepo->findOrFail($route->id);
        $data['categorias'] = $this->categoriaRepo->listAll();
        $data['tags'] = $this->noticiaRepo->frequentTags();
        $data['etiq'] = explode(',', $data['noticia']->tags);

        foreach($data['etiq'] as $key => $val){
            $etiquetas[$val]=$val;
        }
        $data['etiquetas'] = $etiquetas;

        return view('noticias.partials.editarForm')->with($data);
    }


    public function edit(CreateNoticiaRequest $request)
    {
        $noticia = $this->noticiaRepo->findOrFail($request->id);

        if($request['tags'] != null)
            $request['tags'] = implode(",", $request['tags']);

        $this->noticiaRepo->edit($noticia, $request->only('categoria', 'titulo', 'epigrafe', 'cuerpo', 'tags'));

        if($request->file('foto_portada')) {
            if ($noticia->multimedia_id != null)
                $this->noticiaRepo->deleteImage($noticia->multimedia_id);

            $foto_portada = $request->file('foto_portada');
            $foto = $this->noticiaRepo->uploadFile($foto_portada);
            $this->noticiaRepo->edit($noticia, $foto);

        }

        if($request['suprimir_foto'] && $noticia->multimedia_id != null){
            $this->noticiaRepo->deleteImage($noticia->multimedia->id);
            $this->noticiaRepo->edit($noticia, ['multimedia_id' => null ]);
        }

        return redirect()->route('noticias.verNoticia', [$request->id])->with('msgOk','Noticia editada con éxito.');
    }


    public function restore($id)
    {
        $noticia = $this->noticiaRepo->evenIfTrashed($id);
        $noticia->restore();

        return redirect()->back()->with('msgOk', 'Noticia recuperada con éxito.');
    }
}