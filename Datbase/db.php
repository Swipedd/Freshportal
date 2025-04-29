<?php
class Database
{
    private $host = "localhost";
    private $db_name = "testportal";
    private $username = "root";
    private $password = "";
    private $oop;

    public function getConnection()
    {
        $this->oop = null;
        try {
            $this->oop = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
            $this->oop->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $exception) {
            echo "Connection error: " . $exception->getMessage();
        }
        return $this->oop;
    }
}
