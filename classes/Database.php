<?php

class Database {
    public function __construct() {
        $this->db = new PDO ('mysql:host=localhost; dbname=livreor', 'root', '');
    }

    // Modify login AND password
    public function modify_login_password() {

    }

    // Modify login
    public function modify_login() {
        if (!empty($_SESSION['user'])) {
            $name = $_SESSION['user'];
        }
        $user_login = $_POST['user_login'];
        $sql = "UPDATE user SET login = '$user_login' WHERE login = '$name'";
        $query = $this->db->prepare($sql);
        $query->execute();
        // $query2 = $this->db->prepare($sql2);
        // $query2->execute(array($user_login));
    }

    // Modify password
    public function modify_password() {

    }
}

?>