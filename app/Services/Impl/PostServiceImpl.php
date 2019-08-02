<?php


namespace App\Services\Impl;


use App\Post;
use App\Repositories\PostRepository;
use App\Services\PostService;

class PostServiceImpl implements PostService
{

    protected $postRepository;

    public function __construct(PostRepository $postRepository)
    {
        $this->postRepository=$postRepository;
    }

    public function getAll()
    {
        $posts = $this->postRepository->getAll();
        return $posts;
    }

    public function findById($id)
    {
        $post = $this->postRepository->findById($id);

        $statusCode = 200;
        if (!$post)
            $statusCode = 404;

        $data = [
            'statusCode'=> $statusCode,
            'post' => $post
        ];

        return $data;
    }

    public function create($request)
    {
        $this->postRepository->create($request);

//        $posts = $this->postRepository->create($request);
//        return $posts;
//        $statusCode = 201;
//
//        if (!$posts)
//            $statusCode = 500;
//
//        $data = [
//            'statusCode'=> $statusCode,
//            '$posts' => $posts
//        ];

    }

    public function update($request, $id)
    {
        $oldpost = $this->postRepository->findById($id);
        $this->postRepository->update($request,$oldpost);

//        $oldpost = $this->postRepository->findById($id);
//
//        if (!$oldpost){
//            $newpost = null;
//            $statusCode = 404;
//        }else{
//            $newpost = $this->postRepository->update($request,$oldpost);
//            $statusCode = 200;
//        }
//
//        $data = [
//            'statusCode'=> $statusCode,
//            '$posts' => $newpost
//        ];
//
//        return $data;
    }

    public function destroy($id)
    {
        $posts = $this->postRepository->findById($id);
        $statusCode = 404;
        $message = "User not found";
        if ($posts) {
            $this->postRepository->destroy($posts);
            $statusCode = 200;
            $message = "Delete success!";
        }

        $data = [
            'statusCode' => $statusCode,
            'message' => $message
        ];
        return $data;
    }
}