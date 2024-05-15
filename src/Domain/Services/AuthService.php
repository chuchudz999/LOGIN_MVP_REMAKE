<?php

namespace App\Domain\Services;

use App\Domain\Access\IUserRepository;

class AuthService
{
    protected $userRepository;

    public function __construct(IUserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function login(string $email, string $password)
    {
        $user = $this->userRepository->findByEmail($email);
        if ($user && password_verify($password, $user['password'])) {
            return $user;
        }
        return null;
    }

    public function register(string $name, string $email, string $password)
    {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        return $this->userRepository->addUser([
            'name' => $name,
            'email' => $email,
            'password' => $hashedPassword
        ]);
    }
}
