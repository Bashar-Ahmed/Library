<?php

namespace Controller;

class Deny {

    public function post() {
        \Model\Book::deny($_POST["bookid"]);   
        header("Location: /booklist-admin");
    }
    
}