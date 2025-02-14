<?php

namespace App\Entity;

use App\Repository\CommentRepository;
use Attributes\TargetRepository;
use Core\Attributes\Table;


#[Table(name: "comments")]
#[TargetRepository(repoName: CommentRepository::class)]
class Comment
{
    private int $id;
    private string $content;
    private int $burger_id;

    public function getId(): int
    {
        return $this->id;
    }

    public function getContent(): string
    {
        return $this->content;
    }

    public function setContent(string $content): void
    {
        $this->content = $content;
    }

    public function getBurgerId(): int
    {
        return $this->burger_id;
    }

    public function setBurgerId(int $burger_Id): void
    {
        $this->burger_id = $burger_Id;
    }


}