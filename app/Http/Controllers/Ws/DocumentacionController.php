<?php namespace App\Http\Controllers\Ws;

use App\Http\Controllers\Controller;
use App\Http\Repositories\FavoritosRepo;
use App\Http\Repositories\DocumentoRepo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DocumentacionController extends Controller
{
    protected $documentoRepo;
    protected $favoritosRepo;

    public function __construct(DocumentoRepo $documentoRepo, FavoritosRepo $favoritosRepo)
    {
        $this->documentoRepo = $documentoRepo;
        $this->favoritosRepo = $favoritosRepo;
    }

    public function getFavoritos(Request $request)
    {
        $documento = $this->documentoRepo->findOrFail($request->nid);
        $ownFavorite = $this->favoritosRepo->findIfFavorite(Auth::user()->id, $documento->id, 'documento');

        if($ownFavorite != false) $ownFavorite = true;

        $resultado = ['ownFavorite' => $ownFavorite];

        return response()->json($resultado, 200);
    }

    public function postFavoritos(Request $request)
    {
        $documento = $this->documentoRepo->findOrFail($request->nid);
        $ownFavorite = $this->favoritosRepo->findIfFavorite(Auth::user()->id, $documento->id, 'documento');

        if($ownFavorite != false){

            $favorito = $this->favoritosRepo->findOrFail($ownFavorite);
            $favorito->delete();

        }else {

            $favorito = $this->favoritosRepo->instanciar(['user_id' => Auth::user()->id]);
            $documento->favoritos()->save($favorito);

        }

        return response()->json([], 200);
    }
}