<?php

namespace App\Controller;

use App\Entity\Burger;
use App\Form\BurgerType;
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

    #[Route(uri:'/burger/new', routeName: 'newBurger')]
    public function create():Response
    {
        $burgerForm = new BurgerType();
        if($burgerForm->isSubmitted())
        {
            $burger = new Burger();
            $burger->setTitle($burgerForm->getValue("title"));
            $burger->setContent($burgerForm->getValue("content"));
            $id = $this->getRepository()->save($burger);
            return $this->redirectToRoute('burgers', ["id" => $id]);
        }
        return $this->render('burger/create', []);
    }

    #[Route(uri:'/burger/update', routeName: 'editBurger')]
    public function update():Response
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

        $formBurger = new BurgerType();
        if($formBurger->isSubmitted())
        {
            $burger->setTitle($formBurger->getValue("title"));
            $burger->setContent($formBurger->getValue("content"));
            $burger = $this->getRepository()->update($burger);
            return $this->redirectToRoute('burger', ["id" => $burger->getId()]);
        }
        return $this->render('burger/update', ["burger" => $burger]);
    }

    #[Route(uri:'/burger/delete', routeName: 'deleteBurger')]
    public function delete():Response
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
        $this->getRepository()->delete($burger);
        return $this->redirectToRoute('burgers');
    }
}