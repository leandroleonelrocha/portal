<?php namespace App\Http\Controllers;

use App\Entities\Navbar;
use App\Http\Repositories\NavbarRepo;
use App\Http\Requests\ChangeRoutesRequest;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

class NavbarController extends Controller
{

    protected $navbarRepo;

    public function __construct(NavbarRepo $navbarRepo)
    {
        $this->navbarRepo = $navbarRepo;
    }

    public function index()
    {
        $navbar = $this->navbarRepo->navbar();
        $rutas = json_encode($navbar->toArray());

        return view('navbar.index', compact('navbar', 'rutas'));
    }

    public function change(ChangeRoutesRequest $request)
    {
        $rutas = json_decode($request->get('rutas'));
        $currentAmount = $this->navbarRepo->navbar()->count();
        $nuevosTextos = [];
        $nuevasRutas =[];
        $nuevasDirecciones =[];

        $habilitado = $request->habilitado;
        $newOrder = $request->order;
        $this->navbarRepo->habilitacion($habilitado);


        foreach ($rutas as $ruta) {

            array_push($nuevosTextos, $ruta->nombre);
            array_push($nuevasRutas, $ruta->ruta);
            array_push($nuevasDirecciones, $ruta->direccion);

            if (!isset($ruta->id)) {
                $this->navbarRepo->create([
                    'ruta' => $ruta->ruta,
                    'nombre' => $ruta->nombre,
                    'direccion' => $ruta->ruta,
                    'orden' => $currentAmount + 1,
                    'habilitado' => '1'
                ]);
            }

        }

        $this->navbarRepo->changeText($nuevosTextos);
        $this->navbarRepo->changeRoutes($nuevasRutas, 'ruta');
        $this->navbarRepo->changeRoutes($nuevasDirecciones, 'direccion');
        // 'changeOrder' debe ejecutarse sólo después de haber realizado todos los cambios previos.
        $this->navbarRepo->changeOrder($newOrder);

        return redirect()->route('navbar.index')->with('msgOk', 'Cambios aplicados correctamente');
    }

    public function destroy(Request $request)
    {
        $item = $this->navbarRepo->findOrFail($request->idRuta);
        $item->delete();

        return redirect()->route('navbar.index')->with('MsgOk', 'La ruta ha sido eliminada');
    }


}