<?php

namespace Controller;

class Signin {

    public function get() {
        if($_SESSION['id']==0) {
            echo \View\Loader::make()->render("templates/signin.twig",array(
                "disp"=> false,
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
                    "disp"=> true,
                ));
            }
        }
        else {
            header("Location: /signup");
        }
    }
}