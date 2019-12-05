<?php

use Phalcon\Mvc\Controller;

class UsersController extends Controller
{
    public function indexAction()
    {

    }

    public function loginAction()
    {
        $val = new UserValidation();
        $messages = $val->validate($_POST);

        if(count($messages)){
            foreach($messages as $m){
                echo $m, "<br>";
            }
        }

        else{
            $this->response->redirect('/');
        }
    }
}