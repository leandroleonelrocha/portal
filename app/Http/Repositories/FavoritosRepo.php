<?php namespace App\Http\Repositories;

use App\Entities\Favorito;
use Illuminate\Support\Facades\Auth;

class FavoritosRepo extends BaseRepo
{
    public function getModel()
    {
        return new Favorito;
    }

    public function getOwnFavorites()
    {
        return $this->model->all()->where('user_id', Auth::user()->id);
    }

    public function findIfFavorite($userID, $objetoID, $objetoType)
    {
        $favorito = $this->model->where('user_id', $userID)
            ->where('objeto_id', $objetoID)
            ->where('objeto_type', $objetoType)
            ->first();

        return $favorito ? $favorito->id : false;

    }

}