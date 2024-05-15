<?php

namespace App\Domain\Access;

use App\Lib\Database\Database;
use PDO;

class UserRepository implements IUserRepository
{
    protected $db;

    public function __construct()
    {
        $this->db = Database::getConnection();
    }

    public function findByEmail(string $email)
    {
        $stmt = $this->db->prepare("SELECT * FROM users WHERE email = :email");
        $stmt->execute(['email' => $email]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function addUser(array $userData)
    {
        $stmt = $this->db->prepare("INSERT INTO users (name, email, password) VALUES (:name, :email, :password)");
        return $stmt->execute($userData);
    }
}
