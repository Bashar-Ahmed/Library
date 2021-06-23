<?php

namespace Controller;

class Give {

    public function post() {
        if(isset($_SESSION['admin'])) {
            $reqby = \Model\Book::give($_POST["bookid"]);
            \Model\Book::update($_POST["bookid"],$reqby);
            header("Location: /booklist-admin"); 
        }  
    }

}