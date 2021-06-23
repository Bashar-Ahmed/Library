<?php

namespace Controller;

class AddBook {

    public function get() {
        if(isset($_SESSION['admin'])) {
            echo \View\Loader::make()->render("templates/addbook.twig");
        }
        else {
            header("Location: /");
        }
    }

    public function post() {
        if(isset($_SESSION['admin'])) {
            $name = $_POST["name"];
            $author = $_POST["author"];
            \Model\Book::add($name,$author); 
            header("Location: /booklist-admin");
        }         
    }

}