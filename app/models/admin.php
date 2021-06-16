<?php

namespace Model;

class Book {

    public static function add($name,$author) {
        echo "KK";
        $db = \DB::get_instance();
        $stmt=$db->prepare("INSERT INTO books (name,author) VALUES (?,?)");
        $stmt->execute([$name,$author]);
        header("Location: /booklist-admin");
    }


    public static function remove($bookid) {
        $db = \DB::get_instance();
        $stmt=$db->prepare("DELETE FROM books WHERE id = ?");
        $stmt->execute([$bookid]);
        header("Location: /booklist-admin");
    }

    public static function give($bookid) {
        $db = \DB::get_instance();
        $stmt=$db->prepare("SELECT reqby FROM books where id = ?");
        $stmt->execute([$bookid]);
        $reqby=$stmt->fetch();
        $stmt=$db->prepare("UPDATE books SET status = ? WHERE id = ?");
        $stmt->execute([$reqby[0],$bookid]);
        $stmt=$db->prepare("UPDATE books SET reqby = 0 WHERE id = ?");
        $stmt->execute([$bookid]);
        header("Location: /booklist-admin");
    }

    public static function deny($bookid) {
        $db = \DB::get_instance();
        $stmt=$db->prepare("UPDATE books SET reqby = 0 WHERE id = ?");
        $stmt->execute([$bookid]);
        header("Location: /booklist-admin");
    }

}