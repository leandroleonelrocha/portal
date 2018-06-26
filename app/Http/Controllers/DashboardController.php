<?php namespace App\Http\Controllers;

use App\Entities\Noticia;
use App\Http\Repositories\NoticiaRepo;
use App\Http\Repositories\NavbarRepo;
use Carbon\Carbon;

class DashboardController extends Controller
{
    protected $noticiaRepo;
    protected $navbarRepo;

    public function __construct(NoticiaRepo $noticiaRepo, NavbarRepo $navbarRepo)
    {
        $this->noticiaRepo = $noticiaRepo;
        $this->navbarRepo = $navbarRepo;
    }

    public function index()
    {

        $data['fecha'] = Carbon::now();

        $data['noticias'] = Noticia::orderBy('created_at', 'desc')->get(); #$this->noticiaRepo->allExceptFirst();
        #$data['primeraNoticia'] = $this->noticiaRepo->primeraNoticia();
        $data['navbar'] = $this->navbarRepo->navbar();

        #$n = $this->noticiaRepo->noticiasLeftAndRight($data['noticias']);
        #$data['noticiasLeft'] = $n['noticiasLeft'];
        #$data['noticiasRight'] = $n['noticiasRight'];

        return view('dashboard.index')->with($data);
    }

    public function noticias()
    {
        $data['noticias'] = $this->noticiaRepo->allExceptFirst();
        $data['primeraNoticia'] = $this->noticiaRepo->primeraNoticia();
        $data['navbar'] = $this->navbarRepo->navbar();

//        foreach($data['noticias'] as $noticia)
//            $noticia->imageExists = $this->noticiaRepo->imageExists($noticia->image_name);

        $n = $this->noticiaRepo->noticiasLeftAndRight($data['noticias']);
        $data['noticiasLeft'] = $n['noticiasLeft'];
        $data['noticiasRight'] = $n['noticiasRight'];

        return view('dashboard.noticias')->with($data);
    }
}