<?php

namespace Controller;

class Home {

    public function get() { 
        \Controller\Util::check_session_ifset("/booklist-admin","admin");
        \Controller\Util::check_session_ifset("/booklist-user","id");
        echo \View\Loader::make()->render("templates/home.twig"); 
    }

    public function post() {
        unset($_SESSION['id']);
        unset($_SESSION['admin']);
        header("Location: /");
    }
    
}