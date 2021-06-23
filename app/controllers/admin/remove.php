<?php

namespace Controller;

class Remove {

    public function post() {
        if(isset($_SESSION['admin'])) {
            \Model\Book::remove($_POST["bookid"]); 
            header("Location: /booklist-admin"); 
        }
    }

}