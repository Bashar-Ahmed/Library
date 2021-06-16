<?php

namespace Controller;

class Signin {
    public function get() {
        if($_SESSION['id']==0)
            echo \View\Loader::make()->render("templates/signin.twig",array(
                "disp"=> false,
            ));
        else
            header("Location: /booklist-user");
    }

    public function post() {
        $email = $_POST["email"];
        $password = $_POST["password"];
        $exists = \Model\Signin::check($email);
        $correct = false;
        $hashpwd = hash("sha256",$password);
        if($exists) {
            $correct = \Model\Signin::verify($email,$hashpwd);
            if($correct) {
                $_SESSION['id']=\Model\ID::get_id($email);
                header("Location: /booklist-user");
            }
            else 
                echo \View\Loader::make()->render("templates/signin.twig",array(
                    "disp"=> true,
                ));
        }
        else {
            header("Location: /signup");
        }
    }
}

class Signup {

    public function get() {
        if($_SESSION['id']==0)
            echo \View\Loader::make()->render("templates/signup.twig",array(
                "disp"=> false,
            ));
        else
            header("Location: /booklist-user");
    }

    public function post() {
        $email = $_POST["email"];
        $password = $_POST["password"];
        $exists = \Model\Signup::check($email);
        if($exists)
            echo \View\Loader::make()->render("templates/signup.twig",array(
                "disp"=> true,
            ));
        else {
            $hashpwd = hash("sha256",$password);
            \Model\Signup::insert($email,$hashpwd);
            $_SESSION['id']=\Model\ID::get_id($email);
            header("Location: /booklist-user");
        }
    }

}
