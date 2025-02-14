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

            return $this->redirectToRoute('burgers');
        }
        return $this->render('user/signup', []);
    }

    public function login():Response
    {
        $username = null;
        $password = null;
        if(!empty($_POST['username']) && !empty($_POST['password']))
        {
            $username = $_POST['username'];
            $password = $_POST['password'];
        }
        if($username & $password)
        {
            $registeredUser = $this->getRepository()->findByUsername($username);
            if(!$registeredUser){return $this->redirect(["type"=>"security","action"=>"login"]);}


            $success = $registeredUser->logIn($password);

            if(!$success){return $this->redirect(["type"=>"security","action"=>"login"]);}
            else{return $this->redirect(["type"=>"burger", "action"=>"index"]);}


        }



        return $this->render('user/signin',[]);
    }


    public function logOut():Response
    {
        $user = $this->getUser();
        if($user){$user->logOut();}

        return $this->redirect(["type"=>"security", "action"=>"login"]);
    }
}