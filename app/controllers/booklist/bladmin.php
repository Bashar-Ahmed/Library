<?php

namespace Controller;

class BLAdmin {
    
    public function get() {
        if(isset($_SESSION['admin'])) {
            echo \View\Loader::make()->render("templates/bladmin.twig",array(
                "books"=> \Model\Booklist::get_all(),
            ));
        }
        else {
            header("Location: /");
        }
    }

}