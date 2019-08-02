<?php


namespace App\Repositories\Impl;


use App\Post;
use App\Repositories\Eloquent\EloquentRepository;
use App\Repositories\PostRepository;

class PostRepositoryImpl extends EloquentRepository implements PostRepository
{

    public function getModel()
    {
        $model = Post::class;
        return $model;
    }

}