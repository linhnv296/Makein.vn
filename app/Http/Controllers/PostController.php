<?php

namespace App\Http\Controllers;

use App\Services\PostService;
use Illuminate\Http\Request;

class PostController extends Controller
{
    protected $postService;

    public function __construct(PostService $postService)
    {
        $this->postService = $postService;
    }

    public function getAll(){
        try{
            $posts = $this->postService->getAll();
            return response()->json($posts, 200);
        }catch (\Exception $exception){
            return null;
        }

    }

    public function findById($id){
        $dataPost = $this->postService->findById($id);
        return response()->json($dataPost['post'],$dataPost['statusCode']);
    }

    public function store(Request $request){
       // dd($request);
        try {
            $this->postService->create($request->all());
        } catch (\Exception $e) {
            return response()->json([
                "status" => "Error",
                "message" => $e->getMessage()
            ]);
        }

        return response()->json([
            "status" => "seccuss",
            "message" => "Them moi bai viet thanh cong"
        ]);
    }

    public function update(Request $request, $id){


        try {
            $this->postService->update($request->all(),$id);
        } catch (\Exception $e) {
            return response()->json([
                "status" => "Error",
                "message" => $e->getMessage()
            ]);
        }

        return response()->json([
            "status" => "seccuss",
            "message" => "sua bai viet thanh cong"
        ]);
//        $dataPost = $this->postService->update($request->all(), $id);
//        return response()->json($dataPost['posts'],$dataPost['statusCode']);
    }

    public function destroy($id){
        $dataPost = $this->postService->destroy($id);
        return response()->json($dataPost['message'],$dataPost['statusCode']);
    }
}
