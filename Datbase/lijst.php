<?php
require "db.php";

class Lijst // Gebruik hoofdletter voor de klasse naam
{
    private $oop;

    public function __construct()
    {
        $database = new Database();
        $this->oop = $database->getConnection();
    }

    // taken toevoegen
    public function InsertList($naam, $omschrijving, $gebruikerid)
    {
        $query = "INSERT INTO list (naam, omschrijving, gebruikerid) 
                  VALUES (:naam, :omschrijving, :gebruikerid)";
        $stmt = $this->oop->prepare($query);
        $stmt->bindParam(':naam', $naam);
        $stmt->bindParam(':omschrijving', $omschrijving);
        $stmt->bindParam(':gebruikerid', $gebruikerid);
        return $stmt->execute();
    }

    // taken Overzicht met een prioriteit
    public function SelectList($gebruikerid, $prio = null)
    {
        $query = "SELECT * FROM list WHERE gebruikerid = :gebruikerid";
        if ($prio) {
            $query .= " AND prioriteit = :prioriteit";
        }
        // $stmt = $this->oop->prepare($query);
        // $stmt->bindParam(':gebruikerid', $gebruikerid);
        $stmt = $this->oop->prepare($query);
        $stmt->bindParam(':gebruikerid', $gebruikerid);
        if ($prio) {
            $stmt->bindParam(':prioriteit', $prio);
        }
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // taken update
    public function UpdateList($id, $naam, $omschrijving)
    {
        $query = "UPDATE list SET naam = :naam, omschrijving = :omschrijving WHERE id = :id";
        $stmt = $this->oop->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':naam', $naam);
        $stmt->bindParam(':omschrijving', $omschrijving);
        return $stmt->execute();
    }

    // taken delete
    public function DeleteList($id)
    {
        $query = "DELETE FROM list WHERE id = :id";
        $stmt = $this->oop->prepare($query);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }
}
