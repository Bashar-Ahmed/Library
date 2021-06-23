<?php

namespace Controller;

class Remove {

    public function post() {
        \Controller\Util::check_session_ifnotset("/","admin");
        \Controller\Util::check_post("/","bookid");
        \Model\Book::remove($_POST["bookid"]); 
        header("Location: /booklist-admin"); 
    }

}