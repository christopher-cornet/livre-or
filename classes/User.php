<?php

// require('../classes/Database.php');

class User {
    public $login;
    private $password;

    public function __construct($login, $password) {
        $this->login = $login;
        $this->password = $password;
    }

    // Get
    function get_login() {
        $sql = "SELECT login FROM user WHERE login = $this->login";
        $db->query($query);
    }

    function get_pwd() {
        $sql = "SELECT password FROM user WHERE password = $this->password";
        $db->query($query);
    }

    // Set
    function set_login($new_login) {
        $this->login = $new_login;
    }

    function set_pwd($new_pwd) {
        $this->password = $new_pwd;
    }
}

?>