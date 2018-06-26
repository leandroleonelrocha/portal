<?php namespace App\Http\Repositories;

use App\Entities\Navbar;
use Illuminate\Support\Facades\Route;

class NavbarRepo extends BaseRepo
{
    public function getModel()
    {
        return new Navbar();
    }


    public function navbar()
    {
        $navbar = Navbar::orderBy('orden', 'ASC')->get();

        foreach ($navbar as $item){
            if(!Route::has($item->ruta) && !starts_with($item->ruta, 'http'))
                $item->rutaIncorrecta = true;
        }

        return $navbar;
    }


    public function changeOrder($newOrder)
    {
        $navbar = $this->navbar();
        $array = explode(',', $newOrder);
        $newOrder = array_combine( range(1, count($array)), array_values($array) );

        foreach ($navbar as $item){

            foreach ($newOrder as $newPosition => $oldPosition){
                if($item->orden == $oldPosition){
                    $item->orden = $newPosition;
                    $item->save();
                    break;
                }
            }
        }
    }


    public function habilitacion($habilitado)
    {
        $navbar = $this->navbar();

        foreach ($navbar as $item){
            $item->habilitado = 0;
            foreach ($habilitado as $value){
                if($item->id == $value)
                    $item->habilitado = true;
            }
            $item->save();
        }
    }


    public function changeText($nuevosTextos)
    {
        $navbar = $this->navbar();

        foreach ($navbar as $item){
            foreach ($nuevosTextos as $key => $newText){
                if($item->orden == $key + 1)
                    $item->nombre = $newText;
            }
            $item->save();
        }
    }


    public function changeRoutes($nuevasRutas, $type)
    {
        $navbar = $this->navbar();

        foreach ($navbar as $item){
            foreach ($nuevasRutas as $key => $newRoute){
                if ($item->orden == $key + 1){
                    switch ($type){
                        case 'ruta':
                            $item->ruta = $newRoute;
                        case 'direccion':
                            $item->direccion = $newRoute;
                    }
                }
            }
            $item->save();
        }
    }


}