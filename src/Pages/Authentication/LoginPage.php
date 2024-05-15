<?php

namespace App\Pages\Authentication;

use App\Pages\AbstractPage;

class LoginPage extends AbstractPage implements ILoginPage
{
    public function getEmail(): string
    {
        return $_POST['email'] ?? '';
    }

    public function getPassword(): string
    {
        return $_POST['password'] ?? '';
    }

    public function showSuccessMessage(string $message): void
    {
        $this->smarty->assign('success_message', $message);
        $this->render();
    }

    public function showErrorMessage(string $message): void
    {
        $this->smarty->assign('error_message', $message);
        $this->render();
    }

    public function render()
    {
        $this->smarty->display('login.tpl');
    }
}
