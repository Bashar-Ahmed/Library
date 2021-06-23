<?php

namespace Controller;

class BLAdmin {
    
    public function get() {
        \Controller\Util::check_session_ifnotset("/","admin");
        echo \View\Loader::make()->render("templates/bladmin.twig",array(
            "books"=> \Model\Booklist::get_all(),
        ));
    }

}