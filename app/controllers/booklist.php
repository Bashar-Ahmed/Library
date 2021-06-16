<?php

namespace Controller;

class BLUser {
    
    public function get() {
        echo \View\Loader::make()->render("templates/bluser.twig",array(
            "books"=> \Model\BLUser::get_all(),
            "id" => $_SESSION['id'],
            "email" => \Model\ID::get_email(),
        ));
    }

    public function post() {
        $bookid = $_POST['idbook'];
        \Model\BLUser::req($bookid);
    }

}
class BLAdmin {
    
    public function get() {
        echo \View\Loader::make()->render("templates/bladmin.twig",array(
            "books"=> \Model\BLUser::get_all(),
        ));
    }

}
