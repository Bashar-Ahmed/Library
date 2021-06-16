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
        else 
            echo \View\Loader::make()->render("templates/admin.twig",array(
                "disp"=> true,
            ));            
    }
}

class AddBook {

    public function get() {
            echo \View\Loader::make()->render("templates/addbook.twig");
    }

    public function post() {
        $name = $_POST["name"];
        $author = $_POST["author"];
        \Model\Book::add($name,$author);          
    }

}

class Remove {

    public function post() {
        \Model\Book::remove($_POST["bookid"]);   
    }

}

class Give {

    public function post() {
        \Model\Book::give($_POST["bookid"]);   
    }

}

class Deny {
    public function post() {
        \Model\Book::deny($_POST["bookid"]);   
    }
}