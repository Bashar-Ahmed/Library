<?php

namespace Controller;

class Home {

    public function get() { 
        if(!isset($_SESSION['id']))
            $_SESSION['id']=0;
        if($_SESSION['id']==0)
            echo \View\Loader::make()->render("templates/home.twig");
        else
            header("Location: /booklist-user");
    }

    public function post() {
        $_SESSION['id']=0;
        header("Location: /");
    }
    
}