<?php

class Signup extends Database {

    // Register the User in the Database
    protected function setUser($login, $password) {
        $stmt = $this->connect()->prepare('INSERT INTO users (id, login, password) VALUES (?, ?, ?);');

        $hashedPwd = password_hash($password, PASSWORD_DEFAULT);

        if ($stmt->execute(array('', $login, $hashedPwd))) {
            $stmt = null;
            header("location: ../index.php?error=stmtfailed");
            exit();
        }

        $stmt = null;
    }

    protected function checkUser($login, $password) {
        $stmt = $this->connect()->prepare('SELECT login, password FROM users WHERE login=? AND password=?;');
        
        $stmt->execute(array($login, $password));
        
        // if ()) {
        //     $stmt = null;
        //     header("location: ../index.php?error=stmtfailed");
        //     exit();
        // }

        // verifyPassword($login, $password) {
        //     $pwd = password_verify($password, $hashedPwd)
        // }
        
        // $resultCheck;
        // if ($stmt->rowCount() > 0) {
        //     if (verifyPassword()) {
        //         echo "test";
        //         $resultCheck = true;
        //         $_SESSION['user'] = $user_login;
        //     }
        //     else {
        //         $resultCheck = false;
        //         echo "pwd doesn't match";
        //     }
        // }
        // else {
        //     $resultCheck = false;
        //     echo "test13136136";
        // }

        // return $resultCheck;

        // $stmt = null;
    }
}

?>