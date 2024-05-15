<?php

namespace App\Presenters;

use App\Pages\Authentication\ILoginPage;
use App\Domain\Services\AuthService;

class LoginPresenter extends AbstractPresenter
{
    protected $page;
    protected $authService;

    public function __construct(ILoginPage $page, AuthService $authService)
    {
        $this->page = $page;
        $this->authService = $authService;
    }

    public function handle()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = $this->page->getEmail();
            $password = $this->page->getPassword();

            $user = $this->authService->login($email, $password);

            if ($user) {
                // Login successful
                $this->page->showSuccessMessage('Login Successfull !!!');
                // header('Location: /dashboard');
                exit;
            } else {
                // Login failed
                $this->page->showErrorMessage('Invalid email or password.');
            }
        } else{
            $this->page->render();
        }

        
    }
}
