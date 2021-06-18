<?php

namespace Controller;

class Admin {

    public function get() {
            echo \View\Loader::make()->render("templates/admin.twig",array(
                "disp"=> false,
            ));
    }

    public function post() {
        $password = $_POST["password"];
        if(hash("sha256",$password)=="ef92b778bafe771e89245b89ecbc08a44a4e166c06659911881f383d4473e94f") {
            header("Location: /booklist-admin");
        }
        else {
            echo \View\Loader::make()->render("templates/admin.twig",array(
                "disp"=> true,
            ));
        }           
    }
}