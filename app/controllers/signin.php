<?php

namespace Controller;

class Signin {

    public function get() {
        if(!isset($_SESSION['id'])) {
            echo \View\Loader::make()->render("templates/signin.twig",array(
                "incorrectPassword"=> false,
            ));
        }
        else {
            header("Location: /booklist-user");
        }
    }

    public function post() {
        $email = $_POST["email"];
        $password = $_POST["password"];
        $row = \Model\Sign::check($email);
        $hashpwd = hash("sha256",$password);
        if(strlen($row[0])>0) {
            $row = \Model\Sign::verify($email,$hashpwd);
            if($row[2]==$hashpwd) {
                $row = \Model\Sign::get_id($email);
                $_SESSION['id'] = $row[0];
                header("Location: /booklist-user");
            }
            else {
                echo \View\Loader::make()->render("templates/signin.twig",array(
                    "incorrectPassword"=> true,
                ));
            }
        }
        else {
            header("Location: /signup");
        }
    }
}