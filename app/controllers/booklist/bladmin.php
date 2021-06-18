<?php

namespace Controller;

class BLAdmin {
    
    public function get() {
        echo \View\Loader::make()->render("templates/bladmin.twig",array(
            "books"=> \Model\Booklist::get_all(),
        ));
    }

}