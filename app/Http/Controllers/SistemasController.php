<?php namespace App\Http\Controllers;

use App\Http\Repositories\NavbarRepo;

class SistemasController extends Controller
{
    protected $navbarRepo;

    public function __construct(NavbarRepo $navbarRepo)
    {
        $this->navbarRepo = $navbarRepo;
    }

    public function index()
    {
        $navbar = $this->navbarRepo->navbar();
        return view('sistemas.index')->with('navbar', $navbar);
    }

}
