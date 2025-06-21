<?php

namespace App\Services;

use App\Interfaces\User\UserInterface;

class AuthService
{
    public function __construct(protected UserInterface $userRepository) {}

    public function authenticate(array $credentials): bool
    {
        return auth()->attempt($credentials);
    }

    public function logout(): void
    {
        auth()->logout();
    }
}
