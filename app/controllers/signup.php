<?php

namespace Controller;

class Signup {

    public function get() {
        if($_SESSION['id']==0) {
            echo \View\Loader::make()->render("templates/signup.twig",array(
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
        if(strlen($row[0])>0) {
            echo \View\Loader::make()->render("templates/signup.twig",array(
                "disp"=> true,
            ));
        }
        else {
            $hashpwd = hash("sha256",$password);
            \Model\Sign::insert($email,$hashpwd);
            $row = \Model\Sign::get_id($email);
            $_SESSION['id'] = $row[0];
            header("Location: /booklist-user");
        }
    }

}