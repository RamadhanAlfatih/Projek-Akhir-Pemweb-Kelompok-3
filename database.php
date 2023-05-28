<?php
class Database {
    private static $host = 'localhost';
    private static $dbname = 'finalproject_pemweb';
    private static $username = 'root';
    private static $password = '';

    public static function getConnection() {
        $dsn = "mysql:host=" . self::$host . ";dbname=" . self::$dbname;
        $options = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES => false,
        ];

        try {
            $db = new PDO($dsn, self::$username, self::$password, $options);
            return $db;
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
            exit;
        }
    }
}
