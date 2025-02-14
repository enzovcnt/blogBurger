<?php

namespace App\Repository;

use App\Entity\Burger;
use App\Entity\Comment;
use Attributes\TargetEntity;
use Core\Repository\Repository;

#[TargetEntity(entityName: Comment::class)]
class CommentRepository extends Repository
{
    public function getCommentsByBurger(Burger $burger) : array
    {
        $query = $this->pdo->prepare("SELECT * FROM $this->tableName WHERE burger_id = :burger_id");

        $query->execute([
            'burger_id' => $burger->getId()
        ]);

        return $query->fetchAll(\PDO::FETCH_CLASS, $this->targetEntity);



    }




    public function save(Comment $comment) : Comment
    {

        $this->pdo->prepare("INSERT INTO $this->tableName (content, burger_id) VALUES (:content, :burger_id)")
            ->execute([
            "content"=>$comment->getContent(),
            "burger_id"=>$comment->getBurgerId()
        ]);

        return $this->find($this->pdo->lastInsertId());
    }
}