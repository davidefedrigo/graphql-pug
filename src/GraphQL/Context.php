<?php

namespace App\GraphQL;

use App\Domain\User;

class Context
{
    /**
     * @var User|null
     */
    public $me;

    /**
     * @param $user
     */
    public function __construct($user)
    {
        $this->me = $user;
    }
}