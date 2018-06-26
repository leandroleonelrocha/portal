<?php namespace App\Http\Repositories;

use App\Entities\Likes;

class LikesRepo extends BaseRepo
{
    public function getModel()
    {
        return new Likes;
    }

    public function findIfLike($userID, $objetoID, $objetoType)
    {
        $like = $this->model->where('user_id', $userID)
                            ->where('objeto_id', $objetoID)
                            ->where('objeto_type', $objetoType)
                            ->first();

        return ($like != null) ? $like->id : false;
    }

}