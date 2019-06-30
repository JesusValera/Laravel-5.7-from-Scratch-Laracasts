<?php

namespace App\Repositories;

class DbUserRepository implements UserRepository
{

    public function create(array $attributes)
    {
        dd('Creating the user.');
    }
}