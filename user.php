<?php
require_once 'Database.php';

class User {
    private $username;
    private $password;
    private $email;

    public function __construct($username, $password, $email) {
        $this->username = $username;
        $this->password = $password;
        $this->email = $email;
    }

    // Getter dan setter lainnya jika diperlukan

    public function validateUsername() {
        $db = Database::getConnection();
        $stmt = $db->prepare("SELECT COUNT(*) FROM user WHERE username = :username");
        $stmt->bindParam(':username', $this->username);
        $stmt->execute();
        $count = $stmt->fetchColumn();
    
        return $count === 0;
    }

    public function validateEmail() {
        $db = Database::getConnection();
        $stmt = $db->prepare("SELECT COUNT(*) FROM user WHERE email = :email");
        $stmt->bindParam(':email', $this->email);
        $stmt->execute();
        $count = $stmt->fetchColumn();
    
        return $count === 0;
    }

    public function register() {
        if (!$this->validateUsername()) {
            // Username tidak valid, berikan pesan kesalahan
            return 'Username is already taken.';
        }

        if (!$this->validateEmail()) {
            // Email tidak valid, berikan pesan kesalahan
            return 'Email is already registered.';
        }

        $db = Database::getConnection();
        $stmt = $db->prepare("INSERT INTO user (username, password, email) VALUES (:username, :password, :email)");
        $stmt->bindParam(':username', $this->username);
        $stmt->bindParam(':password', password_hash($this->password, PASSWORD_DEFAULT));
        $stmt->bindParam(':email', $this->email);
        $stmt->execute();

        // Registrasi berhasil
        return 'Registration successful.';
    }
}

