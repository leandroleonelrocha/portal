<?php

namespace App\Http\Controllers;

use App\Entities\Multimedia;
use App\Http\Repositories\NavbarRepo;
use App\Http\Repositories\NoticiaRepo;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;

class MultimediaController extends Controller
{
    protected $noticiaRepo;
    protected $navbarRepo;

    public function __construct(NoticiaRepo $noticiaRepo, NavbarRepo $navbarRepo)
    {
        $this->noticiaRepo = $noticiaRepo;
        $this->navbarRepo = $navbarRepo;
    }

    public function index(Request $request)
    {
        $medias = Multimedia::orderBy('created_at', 'desc')
            ->paginate(50);
        $navbar = $this->navbarRepo->navbar();

        return view('multimedia.index', compact('medias', 'navbar'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'archivo' => 'required|image|max:3072',
            'descripcion' => 'required|max:255',
            'tags' => 'array'
        ]);

        $multimedia = new Multimedia();
        $multimedia->descripcion = $request->get('descripcion');
        $multimedia->tags = implode(',', $request->get('tags'));

        $file = $request->file('archivo');

        // Filename
        $filename = md5(time() . str_random(2)) . '.' . $file->getClientOriginalExtension();
        $multimedia->nombre = $filename;
        $multimedia->extension = $file->getClientOriginalExtension();
        $multimedia->mime = $file->getMimeType();

        // Directory
        $currentDate = Carbon::now();
        $year = $currentDate->format('Y');
        $month = $currentDate->format('m');
        $path = storage_path('app/multimedia/' . $year . '/' . $month);

        $file->move($path, $filename);

        // Save
        $multimedia->save();

        return redirect()->back()->with('msgOk', 'La imagen fue subida correctamente.');
    }

    public function show(Route $route)
    {
        $multimedia = Multimedia::findOrFail($route->id);

        return response()->file($multimedia->file, $multimedia->mime);
    }

//    public function get($id)
//    {
//        $image = Multimedia::where('id', '=', $id)->firstOrFail();
//
//        $year = substr($image->nombre, 0, 4);
//        $mes = $this->noticiaRepo->isMonth($image);
//
//        $directory = $year.'/'.$mes.'/'.$this->noticiaRepo->directoryName($image);
//        $filename = $directory.$image->nombre . "." . $image->extension;
//
//        $path = storage_path('/app/multimedia/' . $filename);
//
//        if(!File::exists($path)) abort(404);
//
//        return Image::make($path)->response();
//
//    }

}
