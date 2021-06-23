<?php

namespace Controller;

class Home {

    public function get() { 
        
        if(isset($_SESSION['id'])) {
            header("Location: /booklist-user");
        }
        else if(isset($_SESSION['admin'])) {
            header("Location: /booklist-admin");
        }
        else {
            echo \View\Loader::make()->render("templates/home.twig"); 
        }
    }

    public function post() {
        unset($_SESSION['id']);
        unset($_SESSION['admin']);
        header("Location: /");
    }
    
}