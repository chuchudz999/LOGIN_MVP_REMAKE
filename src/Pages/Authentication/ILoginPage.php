<?php

namespace App\Pages\Authentication;

use App\Pages\IPage;

interface ILoginPage extends IPage
{
    public function getEmail(): string;
    public function getPassword(): string;
    public function showSuccessMessage(string $message): void;
    public function showErrorMessage(string $message): void;
}
