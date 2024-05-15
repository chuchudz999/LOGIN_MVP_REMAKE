<?php

namespace App\Domain\Access;

interface IUserRepository
{
    public function findByEmail(string $email);
    public function addUser(array $userData);
}
