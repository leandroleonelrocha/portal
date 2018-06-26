<?php namespace App\Http\Controllers\Ws;

use App\Http\Controllers\Controller;
use App\Http\Repositories\LikesRepo;
use App\Http\Repositories\NoticiaRepo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NoticiasController extends Controller
{
    protected $noticiaRepo;

    public function __construct(NoticiaRepo $noticiaRepo)
    {
        $this->noticiaRepo = $noticiaRepo;
    }

    public function getLikes(Request $request, LikesRepo $likesRepo)
    {
        $noticia = $this->noticiaRepo->findOrFail($request->nid);
        $ownLike = $likesRepo->findIfLike(Auth::user()->id, $noticia->id, 'noticia');
        if($ownLike != false) $ownLike = true;

        $resultado = [
            'likes' => $noticia->likes->count(),
            'ownLike' => $ownLike
        ];

        return response()->json($resultado, 200);
    }

    public function postLike(Request $request, LikesRepo $likesRepo)
    {
        $noticia = $this->noticiaRepo->findOrFail($request->nid);
        $ownLike = $likesRepo->findIfLike(Auth::user()->id, $noticia->id, 'noticia');

        if($ownLike != false){

            $like = $likesRepo->findOrFail($ownLike);
            $like->delete();

        }else {

            $like = $likesRepo->instanciar(['user_id' => Auth::user()->id]);
            $noticia->likes()->save($like);

        }

        return response()->json([], 200);
    }
}