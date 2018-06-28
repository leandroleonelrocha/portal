<?php namespace App\Http\Controllers;

use App\Entities\Documento;
use App\Http\Controllers\Ws\AreasController;
use App\Http\Functions\UnidbFunction;
use App\Http\Repositories\AreasRepo;
use App\Http\Repositories\NavbarRepo;
use Illuminate\Http\Request;
use App\Http\Repositories\DocumentoRepo;
use App\Http\Repositories\CategoriaDocumentoRepo;
use App\Http\Requests\DocRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;


class DocumentacionController extends Controller
{
    protected $documentoRepo;
    protected $categoriasDocumentoRepo;
    protected $navbarRepo;

    public function __construct(DocumentoRepo $documentoRepo, CategoriaDocumentoRepo $categoriaDocumentoRepo, NavbarRepo $navbarRepo)
    {
        $this->documentoRepo = $documentoRepo;
        $this->categoriasDocumentoRepo = $categoriaDocumentoRepo;
        $this->navbarRepo = $navbarRepo;
    }


    public function index(AreasRepo $areasRepo)
    {
        $data['navbar'] = $this->navbarRepo->navbar();
        $data['documentos'] = $this->documentoRepo->listAndPaginate();
        $this->documentoRepo->favoritoClass($data['documentos']);
        $data['categorias'] = $this->categoriasDocumentoRepo->listAll();
        $data['areas'] = $areasRepo->getSearch();

        $this->documentoRepo->iClass($data['documentos']);

        return view('documentacion.index')->with($data);
    }


    public function panelControl()
    {
        $navbar = $this->navbarRepo->navbar();
        $documentos = $this->documentoRepo->all();
        $eliminados = $this->documentoRepo->traerEliminados();
        return view('documentacion.documentacionPanelControl', compact('documentos', 'eliminados', 'navbar'));
    }


    public function visualizar($id)
    {
        $documento = $this->documentoRepo->findOrFail($id);
        $documento->lecturas ++;
        $this->documentoRepo->edit($documento, [$documento->lecturas]);

        return redirect($documento->url);
    }


    public function nuevo()
    {
        $navbar = $this->navbarRepo->navbar();
        return view('documentacion.nuevo')->with('navbar', $navbar);
    }


    public function nuevoDoc(AreasRepo $areasRepo, $tipo)
    {
        $data['navbar'] = $this->navbarRepo->navbar();
        $vista = ($tipo == 'text')? 'documentacion.formText' : 'documentacion.formLink';
        $data['categorias'] = $this->categoriasDocumentoRepo->listAll();
        $data['areas'] = $areasRepo->getSearch();
        $data['documento'] = null;

        return view($vista)->with($data);
    }


    public function postDoc(DocRequest $request)
    {
        $data = $request->all();

        if($data['type'] == 'doc'){
            $file = $request->file('archivo');
            $data += $this->documentoRepo->uploadFile($file);

        }elseif($data['type'] == 'link'){
            $data['file_type'] = $data['type'];
            $data['area_nombre'] = $request->area_nombre;
        }

        $this->documentoRepo->create($data);

        return redirect()->route('documentacion')->with('msgOk', 'El documento ha sido agregado correctamente');
    }


    public function favorito($id)
    {
        $documento = $this->documentoRepo->findOrFail($id);

        foreach($documento->favoritos as $favorito){

            if($favorito->user_id == Auth::user()->id){
                $documento->favoritos()->delete($favorito->id);
                return redirect()->route('documentacion.index');//REDIRECT SI QUITA DE LA LISTA
            }

        }
        $documento->favoritos()->create(['user_id' => Auth::user()->id, 'objeto_id' => $id, 'objeto_type' => Documento::getClass()]);

        return redirect()->route('documentacion.index');//REDIRECT SI AGREGA A LA LISTA
    }

    public function eliminar($id)
    {
        $documento = $this->documentoRepo->evenIfTrashed($id);

        if($documento->deleted_at != null){
            $documento->forceDelete();

            if($documento->file_type != 'link')
                Storage::delete($documento->file_name);

            return redirect()->back()->with('msgOk', 'Documento eliminado con éxito.');

        }else{
            $documento->delete();
            return redirect()->back()->with('msgOk', 'El documento ha sido removido de la lista.');
        }

    }


    public function recuperar($id)
    {
        $documento = $this->documentoRepo->evenIfTrashed($id);
        $documento->restore();
        return redirect()->back()->with('msgOk', 'Documento recuperado con éxito.', compact('documento'));
    }


    public function eliminados()
    {
        $navbar = $this->navbarRepo->navbar();
        $eliminados = $this->documentoRepo->traerEliminados();
        return view('documentacion.partials.tablaEliminados', compact('eliminados', 'navbar'));
    }


    public function showEdit( AreasRepo $areasRepo, $id)
    {
        $navbar = $this->navbarRepo->navbar();
        $categorias = $this->categoriasDocumentoRepo->listAll();
        $documento = $this->documentoRepo->findOrFail($id);
        $vista = ($documento->file_type == 'link')? 'documentacion.formLink' : 'documentacion.formText';

        $areas =  $areasRepo->getSearch();

        return view($vista, compact('documento', 'categorias', 'areas', 'navbar'))->with(['var' =>'edit']);
    }


    public function editar(DocRequest $request, $id)
    {
        $documento = $this->documentoRepo->findOrFail($id);
        $this->documentoRepo->edit($documento, $request->only('area_nombre', 'area_id', 'codigo', 'descripcion', 'categoria_id'));

        if($request->type == 'link')
            $this->documentoRepo->edit($documento, $request->only('url'));

        if($request->archivo != null) {
            $data = $this->documentoRepo->uploadFile($request->archivo);
            $documento['file_path'] = $data['file_path'];
            $documento['file_name'] = $data['file_name'];
            $documento['file_type'] = $data['file_type'];
            $documento['url'] = $data['url'];
            $this->documentoRepo->edit($documento, $request->only('archivo'));
        }

        return redirect()->route('documentacion.index')->with('msgOk','Documento editado con éxito.');
    }


    public function buscar(Request $request, UnidbFunction $unidbFunction)
    {
        $data['navbar'] = $this->navbarRepo->navbar();
        $data['categorias'] = $this->categoriasDocumentoRepo->listAll();
        $data['documentos'] = $this->documentoRepo->listAndPaginate();

        if($request->area_nombre != '') {
            $unidbFunction->searchArea($request->area_nombre);
            if ($unidbFunction->getHttpCode() != 200) abort(500);
            $resultado = $unidbFunction->getResultado()->results[0];
            $data['areas'] = $resultado;
            $data['documentos'] = $this->documentoRepo->listAndPaginate(null, $data['areas']->id, null, null);
        }

        if($request->categoria_id != '')
            $data['documentos'] = $this->documentoRepo->listAndPaginate(null, null, $request['categoria_id'], null);

        if($request->search != '')
            $data['documentos'] = $this->documentoRepo->listAndPaginate($request->get('search'), $request->area_id, $request->categoria_id, null);

        $this->documentoRepo->iClass($data['documentos']);

        return view('documentacion.index')->with($data);
    }


}