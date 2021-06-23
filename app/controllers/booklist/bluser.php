<?php

namespace Controller;

class BLUser {
    
    public function get() {
        if(isset($_SESSION['id'])) {
            $row =  \Model\Sign::get_email($_SESSION['id']);
            echo \View\Loader::make()->render("templates/bluser.twig",array(
                "books"=> \Model\Booklist::get_all(),
                "id" => $_SESSION['id'],
                "email" => $row[1],
            ));
        }
        else {
            header("Location: /");
        }
    }

    public function post() {
        if(isset($_SESSION['id'])) {
            $bookid = $_POST['idbook'];
            $rows = \Model\Booklist::req($bookid);
            if($rows[0]==0) {
                \Model\Booklist::update($_SESSION['id'],$bookid);
            }
            header("Location: /booklist-user");
        }
    }

}