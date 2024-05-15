<?php

require __DIR__ . '/vendor/autoload.php';

use Dotenv\Dotenv;
use App\Lib\Database\Database;
use App\Domain\Access\UserRepository;
use App\Domain\Services\AuthService;
use App\Presenters\LoginPresenter;
use App\Presenters\RegisterPresenter;
use App\Pages\Authentication\LoginPage;
use App\Pages\Authentication\RegisterPage;

// Load environment variables
$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();

// Get database configuration
$config = require(__DIR__ . '/src/Config/config.php');

// Initialize database
Database::init($config['database']);

// Initialize repositories and services
$userRepository = new UserRepository();
$authService = new AuthService($userRepository);

// Initialize pages and presenters
$loginPage = new LoginPage();
$loginPresenter = new LoginPresenter($loginPage, $authService);

// $registerPage = new RegisterPage();
// $registerPresenter = new RegisterPresenter($registerPage, $authService);

// Handle the request (basic routing)
$requestUri = $_SERVER['REQUEST_URI'];

if ($requestUri === '/login') {
    $loginPresenter->handle();
} elseif ($requestUri === '/register') {
    $registerPresenter->handle();
} else {
    // Default to login page
    header('Location: /login');
    exit;
}
