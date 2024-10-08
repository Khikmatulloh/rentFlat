<?php

declare(strict_types=1);
namespace App;
use PDO;
class Branch{
    public function __construct()
    {
        $this->pdo = DB::connect();
    }

    public function createStatus(string $name)
    {
        $stmt=$this->pdo->prepare("INSERT INTO `status` (`name`) VALUES (:name)");
        $stmt->bindParam(':name',$name);
        return $stmt->execute();

    }

    public function updateStatus(int $id, string $name)
    {
        $stmt=$this->pdo->prepare("UPDATE `status` SET `name`=:name WHERE id=:id");
        $stmt->bindParam(':name',$name);
        return $stmt->execute();
    }

    public function getStatus(int $id)
    {
        $stmt=$this->pdo->prepare("SELECT * FROM `status` WHERE `id`=:id");
        $stmt->bindParam(':id',$id);
        $stmt->execute();
        return $stmt->fetch();
    }

    public function deleteStatus(int $id)
    {
        $stmt=$this->pdo->prepare("DELETE FROM `status` WHERE `id`=:id");
        $stmt->bindParam(':id',$id);
        return $stmt->execute();

    }
}