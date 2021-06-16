<?php

namespace Model;

class Signin {

    public static function check($email) {
        $db = \DB::get_instance();
        $stmt=$db->prepare("SELECT * FROM accounts WHERE email = ?");
        $stmt->execute([$email]);
        $row=$stmt->fetch();
        if (strlen($row[0])>0)
            return true;
        else
            return false;
    }

    public static function verify($email,$password) {
        $db = \DB::get_instance();
        $stmt = $db->prepare("SELECT * FROM accounts WHERE email = ?");
        $stmt->execute([$email]);
        $row = $stmt->fetch();
        if ($row[2]==$password)
            return true;
        else 
            return false;
    }

}

class Signup {

    public static function check($email) {
        $db = \DB::get_instance();
        $stmt=$db->prepare("SELECT * FROM accounts WHERE email = ?");
        $stmt->execute([$email]);
        $row=$stmt->fetch();
        if (strlen($row[0])>0)
            return true;
        else
            return false;
    }

    public static function insert($email,$password) {
        $db = \DB::get_instance();
        $stmt = $db->prepare("INSERT INTO accounts (email,password) VALUES (?,?)");
        $stmt->execute([$email,$password]);
    }
    
}

class ID {
    
    public static function get_id($email) {
        $db = \DB::get_instance();
        $stmt=$db->prepare("SELECT * FROM accounts WHERE email = ?");
        $stmt->execute([$email]);
        $row=$stmt->fetch();
        return $row[0];
    }

    public static function get_email() {
        $db = \DB::get_instance();
        $stmt=$db->prepare("SELECT * FROM accounts WHERE id = ?");
        $stmt->execute([$_SESSION['id']]);
        $row=$stmt->fetch();
        return $row[1];
    }
    
}