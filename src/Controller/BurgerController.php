<?php

namespace App\Controller;

use App\Entity\Burger;
use Attributes\DefaultEntity;
use Core\Attributes\Route;
use Core\Controller\Controller;

#[DefaultEntity(entityName: Burger::class)]
class BurgerController extends Controller
{
    #[Route('/burgers', routeName: 'burgers')]
    public function index()
    {
        return $this->render('burger/index', [
            "burgers" => $this->getRepository()->findAll(),
        ]);
    }
}