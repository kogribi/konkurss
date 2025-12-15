<?php
class Connection {
    private $host = "83.149.95.206";
    private $db_name = "jekabsar_christmas";
    private $username = "jekabsar_reader";
    private $password = "Christmas2022";
    private $conn;

    public function __construct() {
        $this->conn = null;
        $dsn = "mysql:host={$this->host};dbname={$this->db_name};charset=utf8mb4";

        try {
            $this->conn = new PDO($dsn, $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        } catch(PDOException $e) {
            error_log("Database connection failed: " . $e->getMessage());
            die("Connection failed. Please try again later.");
        }
    }

    public function get_connection() {
        return $this->conn;
    }
}
?>