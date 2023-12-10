<?php

namespace Model;

class User extends Model
{

    public function __construct(
        private string $name,
        private string $email,
        private string $password,
    ) {}

    

}