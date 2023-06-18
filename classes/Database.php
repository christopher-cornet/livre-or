<?php

class Database {
    public function __construct() {
        $username = 'root';
        $password = '';
        $db = new PDO ('mysql:host=localhost; dbname=livreor', $username, $password);
    }

    public function modify_login_password() {

    }

    public function modify_login() {
        $user_login = $_POST['user_login'];
        $sql = "Select password FROM user WHERE login = '$user_login'";
        $sql2 = "UPDATE login SET login = '$user_login' WHERE login = '$user_login'";
        $db = new PDO ('mysql:host=localhost; dbname=livreor', $username, $password);
        $query = $db->prepare($sql);
        $query->execute(array($user_login));
        $query2 = $db->prepare($sql2);
        $query2->execute(array($user_login));
    }

    public function modify_password() {

    }
}

$database = new Database;

?>