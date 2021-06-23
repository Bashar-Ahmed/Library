<?php

namespace Controller;

class Deny {

    public function post() {
        \Controller\Util::check_session_ifnotset("/","admin");
        \Model\Book::deny($_POST["bookid"]);   
        header("Location: /booklist-admin");
    }
    
}