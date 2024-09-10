<?php

namespace App\Http\Repositories\User;

use App\Http\Repositories\EloquentRepository;
use App\Jobs\SendMailActiveUser;

class UserEloquentRepository extends EloquentRepository implements UserRepositoryInterface
{
    /**
     * get model
     * @return string
     */
    public function getModel()
    {
        return \App\Http\Models\User::class;
    }

    public function sendMail()
    {
        SendMailActiveUser::dispatch();
    }
}
