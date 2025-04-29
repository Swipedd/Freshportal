<?php
require "db.php";

class gebruiker
{
    private $oop;

    public function __construct()
    {
        $database = new Database();
        $this->oop = $database->getConnection();
    }

    public function Register($naam, $achternaam, $email, $wachtwoord)
    {
        $query = "INSERT INTO gebruiker (naam, achternaam, email, wachtwoord) 
        VALUES (:naam, :achternaam, :email, :wachtwoord)";
        $stmt = $this->oop->prepare($query);
        $stmt->bindParam(':naam', $naam);
        $stmt->bindParam(':achternaam', $achternaam);
        $stmt->bindParam(':email', $email);
        $hashed = password_hash($wachtwoord, PASSWORD_DEFAULT);
        $stmt->bindParam(':wachtwoord', $hashed);
        return $stmt->execute();
    }

    public function Login($email, $wachtwoord)
    {
        $query = "SELECT * FROM gebruiker WHERE email = :email";
        $stmt = $this->oop->prepare($query);
        $stmt->bindParam(':email', $email);
        $stmt->execute();

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user && password_verify($wachtwoord, $user['wachtwoord'])) {
            return $user;
        }

        return false;
    }
}
