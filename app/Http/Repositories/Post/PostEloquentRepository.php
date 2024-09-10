<?php

namespace App\Http\Repositories\Post;

use App\Http\Repositories\EloquentRepository;

class PostEloquentRepository extends EloquentRepository implements PostRepositoryInterface
{
    /**
     * get model
     * @return string
     */
    public function getModel()
    {
        return \App\Http\Models\Post::class;
    }

    public function getAll()
    {
        return $this->_model->all();
    }
}
