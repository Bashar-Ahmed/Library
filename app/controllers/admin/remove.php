<?php

namespace Controller;

class Remove {

    public function post() {
        \Model\Book::remove($_POST["bookid"]); 
        header("Location: /booklist-admin"); 
    }

}