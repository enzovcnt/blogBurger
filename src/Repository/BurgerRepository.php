<?php

namespace App\Repository;

use App\Entity\Burger;
use Attributes\TargetEntity;
use Core\Repository\Repository;

#[TargetEntity(entityName: Burger::class)]
class BurgerRepository extends Repository
{

    public function save(Burger $burger): int
    {
        $this->pdo->prepare("INSERT INTO $this->tableName (title, content) VALUES (:title, :content)")
            ->execute([
                'title' => $burger->getTitle(),
                'content' => $burger->getContent()
            ]);

        return $this->pdo->lastInsertId();
    }

    public function update(Burger $burger)

    {
        $this->pdo->prepare("UPDATE $this->tableName SET title = :title,  content = :content WHERE id = :id")

            ->execute([
                'title' => $burger->getTitle(),
                'content' => $burger->getContent(),
                'id' => $burger->getId()
            ]);
        return $this->find($burger->getId());
    }

}