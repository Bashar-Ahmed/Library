<?php

namespace Model;

class BLUser {

    public static function get_all() {
        $db = \DB::get_instance();
        $stmt=$db->prepare("SELECT * FROM books");
        $stmt->execute();
        $rows=$stmt->fetchAll();
        return $rows;
    }

    public static function req($bookid) {
        $db = \DB::get_instance();
        $stmt=$db->prepare("SELECT reqby FROM books WHERE id = ?");
        $stmt->execute([$bookid]);
        $rows=$stmt->fetch();
        if ($rows[0]==0) {
            $stmt=$db->prepare("UPDATE books SET reqby = ? WHERE id = ?");
            $stmt->execute([$_SESSION['id'],$bookid]);
        }
        header("Location: /booklist-user");
    }
}