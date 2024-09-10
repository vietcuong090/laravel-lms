<?php

namespace App\Http\Controllers;


use App\Http\Repositories\User\UserRepositoryInterface;

class UserController extends Controller
{
    protected $userRepository;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function sendMail()
    {
        $this->userRepository->sendMail();
        return redirect()->back()->with('message', 'Successfully!');
    }
}
