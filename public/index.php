<?php

session_start();

require __DIR__."/../vendor/autoload.php";
Toro::serve(array(
    "/"=>"\Controller\Home",
    "/signin"=>"Controller\Signin",
    "/signup"=>"Controller\Signup",
    "/admin"=>"Controller\Admin",
    "/booklist-user"=>"Controller\BLUser",
    "/booklist-admin"=>"Controller\BLAdmin",
    "/addbook"=>"Controller\AddBook",
    "/remove"=>"Controller\Remove",
    "/give"=>"Controller\Give",
    "/deny"=>"Controller\Deny",
));