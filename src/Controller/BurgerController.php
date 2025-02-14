<?php

namespace App\Controller;

use App\Entity\Burger;
use Attributes\DefaultEntity;
use Core\Attributes\Route;
use Core\Controller\Controller;
use Core\Http\Response;

#[DefaultEntity(entityName: Burger::class)]
class BurgerController extends Controller
{
    #[Route(uri:'/burgers', routeName: 'burgers')]
    public function index()
    {
        return $this->render('burger/index', [
            "burgers" => $this->getRepository()->findAll(),
        ]);
    }

    #[Route(uri:'/burger/show', routeName: 'burger')]
    public function show():Response
    {
        $id = $this->getRequest()->get(["id"=>"number"]);

        if(!$id)
        {
            return $this->redirectToRoute('burgers');
        }

        $burger = $this->getRepository()->find($id);

        if(!$burger)
        {
            return $this->redirectToRoute('burgers');
        }
        return $this->render('burger/show', ["burger" => $burger]);
    }
}