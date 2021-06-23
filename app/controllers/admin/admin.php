<?php

namespace Controller;

class Admin {

    public function get() {
        if(!isset($_SESSION['admin'])) {
            echo \View\Loader::make()->render("templates/admin.twig",array(
                "incorrectPassword"=> false,
            ));
        }
        else {
            header("Location: /booklist-admin");
        }
    }

    public function post() {
        $password = $_POST["password"];
        if(hash("sha256",$password)=="ef92b778bafe771e89245b89ecbc08a44a4e166c06659911881f383d4473e94f") {
            $_SESSION['admin']=true;
            header("Location: /booklist-admin");
        }
        else {
            echo \View\Loader::make()->render("templates/admin.twig",array(
                "incorrectPassword"=> true,
            ));
        }           
    }
}