<?php namespace App\Http\Repositories;

use App\Http\Functions\UnidbFunction;


class AreasRepo
{

    public function getSearch()
    {
        $unidbFunction = new UnidbFunction();
        $unidbFunction->searchArea();

        if ($unidbFunction->getHttpCode() != 200) abort(500);

        $resultado = $unidbFunction->getResultado();

        $data['default'] = '';

        foreach ($resultado->results as $result){
            
            $data[$result->id] = $result->nombre;

        }

        return $data;
    }

}