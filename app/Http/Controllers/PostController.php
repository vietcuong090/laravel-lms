<?php

namespace App\Http\Controllers;



use App\Http\Repositories\Post\PostRepositoryInterface;

class PostController extends Controller
{
    protected $postRepository;

    public function __construct(PostRepositoryInterface $postRepository)
    {
        $this->postRepository = $postRepository;
    }

    public function index()
    {
        $data = $this->postRepository->getAll();
        return view('post.index', compact('data'));
    }
}
