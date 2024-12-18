<?php
// config/database.php
class Database {
    private $host = '160.19.166.42';
    private $db_name = '2C_klp1';
    private $username = '2C_klp1';
    private $password = 'y8nuA9)4IdOqYqX@';
    private $conn;

    public function connect() {
        $this->conn = null;
        try {
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $e) {
            echo "Connection error: " . $e->getMessage();
        }
        return $this->conn;
    }
}
