<?php

namespace App;

use PDO;

class Ads {
    private PDO $pdo;

    public function __construct()
    {
        $this->pdo = DB::connect();
    }

    public function createAd(string $title, string $description, int $user_id, int $status_id, int $branch_id, string $address, float $price, int $rooms) :bool
    {
        $query = "INSERT INTO ads (title, description, user_id, status_id, branch_id, address, price, rooms, created_at)
                  VALUES (:title, :description, :user_id, :status_id, :branch_id, :address, :price, :rooms, NOW())";
        $stmt = $this->pdo->prepare($query);

        $stmt->bindParam(':title', $title);
        $stmt->bindParam(':description', $description);
        $stmt->bindParam(':user_id', $user_id);
        $stmt->bindParam(':status_id', $status_id);
        $stmt->bindParam(':branch_id', $branch_id);
        $stmt->bindParam(':address', $address);
        $stmt->bindParam(':price', $price);
        $stmt->bindParam(':rooms', $rooms);

        return $stmt->execute();
    }

    
    public function getAllAds()
    {
        $query = "SELECT * FROM ads";
        $stmt = $this->pdo->query($query);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

 
    public function getAdById(int $id)
    {
        $query = "SELECT * FROM ads WHERE id = :id";
        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);

        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }


    public function updateAd(int $id, string $title, string $description, int $user_id, int $status_id, int $branch_id, string $address, float $price, int $rooms) :void
    {
        $query = "UPDATE ads SET title = :title, description = :description, user_id = :user_id, 
                  status_id = :status_id, branch_id = :branch_id, address = :address, 
                  price = :price, rooms = :rooms WHERE id = :id";
        $stmt = $this->pdo->prepare($query);

        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->bindParam(':title', $title);
        $stmt->bindParam(':description', $description);
        $stmt->bindParam(':user_id', $user_id);
        $stmt->bindParam(':status_id', $status_id);
        $stmt->bindParam(':branch_id', $branch_id);
        $stmt->bindParam(':address', $address);
        $stmt->bindParam(':price', $price);
        $stmt->bindParam(':rooms', $rooms);

        $stmt->execute();
    }

 
    public function deleteAd(int $id):void
    {
        $query = "DELETE FROM ads WHERE id = :id";
        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);

        $stmt->execute();
    }
}
