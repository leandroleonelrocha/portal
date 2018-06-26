<?php namespace App\Http\Controllers\Ws;

use App\Http\Controllers\Controller;
use App\Http\Functions\UnidbFunction;
use Illuminate\Http\Request;

class SedesController extends Controller
{
    public function getSearch(Request $request, UnidbFunction $unidbFunction)
    {
        $offset = ($request->has('page')) ? ($request->get('page') - 1) * 10 : 0;
        $unidbFunction->searchSede($request->get('search'), $offset);

        if ($unidbFunction->getHttpCode() != 200) abort(500);

        $resultado = $unidbFunction->getResultado();

        return response()->json($resultado, 200);
    }
}