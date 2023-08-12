<?php

class SignupContr extends Signup {
    public $login;
    private $password;
    private $confirmpwd;

    public function __construct($login, $password, $confirmpwd) {
        $this->login = $login;
        $this->password = $password;
        $this->confirmpwd = $confirmpwd;
    }

    public function signupUser() {
        $this->setUser($this->login, $this->password);
    }

    private function emptyInput() {
        $result;
        if (empty($this->login) && empty($this->password) && empty($this->confirmpwd)) {
            $result = false;
        }
        else {
            $result = true;
        }
        return $result;
    }

    private function invalidLogin() {
        $result;
        if (!preg_match("/^[a-zA-Z0-9]*$/", $this->login)) {
            $result = false;
        }
        else {
            $result = true;
        }
        return $result;
    }

    // private function passwordMatch() {
    //     $result;
    //     if ($this->pwd !== $this->confirmpwd) {
    //         $result = false;
    //     }
    //     else {
    //         $result = true;
    //     }
    //     return $result;
    // }

    private function loginTakenCheck() {
        $result;
        if (!$this->checkUser($this->login, $this->password)) {
            $result = false;
        }
        else {
            $result = true;
        }
        return $result;
    }

    // Get
    // function get_login() {
    //     $sql = "SELECT login FROM user WHERE login = $this->login";
    //     $db->query($query);
    // }

    // function get_pwd() {
    //     $sql = "SELECT password FROM user WHERE password = $this->password";
    //     $db->query($query);
    // }

    // Set
    // function set_login($new_login) {
    //     $this->login = $new_login;
    // }

    // function set_pwd($new_pwd) {
    //     $this->password = $new_pwd;
    // }
}

?>