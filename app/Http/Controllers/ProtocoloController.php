<?php namespace App\Http\Controllers;

use App\Http\Repositories\NavbarRepo;
use App\Http\Functions\SsoFunction;
use Illuminate\Http\Request;
use App\Http\Functions\UnidbFunction;

class ProtocoloController extends Controller
{

    protected $navbarRepo;

    public function __construct(NavbarRepo $navbarRepo)
    {
        $this->navbarRepo = $navbarRepo;
    }

    public function index()
    {
        $navbar = $this->navbarRepo->navbar();
        return view('protocolo.index')->with('navbar', $navbar);
    }


    public function buscarArea(Request $request, UnidbFunction $unidbFunction, SsoFunction $ssoFunction)
    {
        $navbar = $this->navbarRepo->navbar();
        $search = ($request->area != '') ? $request->area : null;
        $offset = ($request->has('page')) ? ($request->get('page') - 1) * 10 : 0;
        $unidbFunction->searchArea($request->get('area'), $offset);

        if ($unidbFunction->getHttpCode() != 200) abort(500);

        $areas = $unidbFunction->getResultado()->results;

        foreach($areas as $area){
            $unidbFunction->getOficinas($area->id);
            $area->oficinas = $unidbFunction->getResultado()->results;
            $area->contacto = $ssoFunction->searchContact($area->responsable->username)[0];
        }

        return view('protocolo.index', compact('areas', 'navbar', 'search'));
    }


    public function buscarResponsable(Request $request, SsoFunction $ssoFunction, UnidbFunction $unidbFunction)
    {
        $navbar = $this->navbarRepo->navbar();
        $search = ($request->search != '') ? $request->search : null;
        $contactos = ($search != null) ? $ssoFunction->searchContact($search) : [];

        foreach ($contactos as $contacto) {
            if($contacto->sede != null) {
                $unidbFunction->getDatosSede($contacto->sede->id);
                if($unidbFunction->getHttpCode() != 200) abort(500);
                $unidbFunction->getResultado()->result;
            }
            if($contacto->area != null){
                $unidbFunction->getDatosArea($contacto->area->id);
                if($unidbFunction->getHttpCode() != 200) abort(500);
                $unidbFunction->getResultado()->result;
            }
        }
        return view('protocolo.index', compact('contactos', 'navbar', 'search'));
    }


    public function showSede($id, UnidbFunction $unidbFunction)
    {
        $navbar = $this->navbarRepo->navbar();
        $unidbFunction->getDatosSede($id);

        if ($unidbFunction->getHttpCode() != 200) abort(500);

        $sede = $unidbFunction->getResultado()->result;

        return view('protocolo.showSede', compact('navbar', 'sede'));
    }


    public function datosArea($id, UnidbFunction $unidbFunction, SsoFunction $ssoFunction)
    {
        $navbar = $this->navbarRepo->navbar();

        $unidbFunction->getDatosArea($id);
        $area = $unidbFunction->getResultado()->result;
        $unidbFunction->getOficinas($area->id);
        //$oficinas = $unidbFunction->getResultado()->results;

        //$contacto = ($area->responsable) ? $ssoFunction->searchContact($area->responsable->username)[0] : '';
        //$contacto->cargo = $area->responsable->cargo->nombre;

        $unidbFunction->getOficinas($area->id);
        $area->oficinas = $unidbFunction->getResultado()->results;
        $area->contacto = $ssoFunction->searchContact($area->responsable->username)[0];

//        return view('protocolo.area', compact('area', 'navbar', 'contacto', 'oficinas'));
        return view('protocolo.index', compact('area', 'navbar', 'contacto', 'oficinas'));
    }

}
