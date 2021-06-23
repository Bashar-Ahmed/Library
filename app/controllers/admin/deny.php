<?php

namespace Controller;

class Deny {

    public function post() {
        if(isset($_SESSION['admin'])) {
            \Model\Book::deny($_POST["bookid"]);   
            header("Location: /booklist-admin");
        }
    }
    
}