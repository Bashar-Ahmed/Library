<?php

namespace Controller;

class AddBook {

    public function get() {
        \Controller\Util::check_session_ifnotset("/","admin");
        echo \View\Loader::make()->render("templates/addbook.twig");
    }

    public function post() {
        \Controller\Util::check_session_ifnotset("/","admin");
        \Controller\Util::check_post("/","name","author");
        $name = $_POST["name"];
        $author = $_POST["author"];
        \Model\Book::add($name,$author); 
        header("Location: /booklist-admin");        
    }

}