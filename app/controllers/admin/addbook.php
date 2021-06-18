<?php

namespace Controller;

class AddBook {

    public function get() {
        echo \View\Loader::make()->render("templates/addbook.twig");
    }

    public function post() {
        $name = $_POST["name"];
        $author = $_POST["author"];
        \Model\Book::add($name,$author); 
        header("Location: /booklist-admin");         
    }

}