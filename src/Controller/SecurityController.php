<?php

namespace App\Controller;

use App\Entity\User;

use App\Form\UserType;
use Attributes\DefaultEntity;
use Core\Attributes\Route;
use Core\Controller\Controller;
use Core\Http\Response;

#[DefaultEntity(entityName: User::class)]
class SecurityController extends Controller
{
    #[Route(uri: "/register", routeName: "register", methods: ["POST"])]
    public function save():Response
    {
        $registerForm = new UserType();
        if($registerForm->isSubmitted()) {



            $register = new User();
            $register->setUsername($registerForm->getValue('username'));
            $register->setPassword($registerForm->getValue('password'));

            $this->getRepository()->save($register);

            return $this->redirectToRoute('login');
        }
        return $this->render('user/signup', []);
    }

    #[Route(uri: "/login", routeName: "login", methods: ["POST"])]
    public function login():Response
    {
        $loginForm = new UserType();
        if($loginForm->isSubmitted()) {



            $login = new User();
            $login->setUsername($loginForm->getValue('username'));
            $login->setPassword($loginForm->getValue('password'));

            $this->getRepository()->findByUsername($login);

            return $this->redirectToRoute('burgers');
        }
        return $this->render('user/signin', []);
    }


    public function logOut():Response
    {
        $user = $this->getUser();
        if($user){$user->logOut();}

        return $this->redirect(["type"=>"security", "action"=>"login"]);
    }
}