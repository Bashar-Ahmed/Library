<?php

namespace Controller;

class BLUser {
    
    public function get() {
        $row =  \Model\Sign::get_email();
        echo \View\Loader::make()->render("templates/bluser.twig",array(
            "books"=> \Model\Booklist::get_all(),
            "id" => $_SESSION['id'],
            "email" => $row[1],
        ));
    }

    public function post() {
        $bookid = $_POST['idbook'];
        $rows = \Model\Booklist::req($bookid);
        if($rows[0]==0) {
            \Model\Booklist::update($bookid);
        }
        header("Location: /booklist-user");
    }

}