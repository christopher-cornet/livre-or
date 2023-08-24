<?php

class Login extends Database {

    // Login the User
    public function loginUser($user_login, $password) {
        $stmt = $this->connect()->prepare('SELECT login, password FROM users WHERE login=? AND password=?;');
        
        $stmt->execute(array($user_login, $password));
        
        // if ()) {
        //     $stmt = null;
        //     header("location: ../index.php?error=stmtfailed");
        //     exit();
        // }

        verifyPassword($user_login, $password) {
            password_verify($password, $hashedPwd)
        }

        $resultCheck;
        if ($stmt->rowCount() > 0) {
            echo "test";
            $resultCheck = true;
            $_SESSION['user'] = $user_login;
        }
        else {
            $resultCheck = false;
            echo "test13136136";
        }

        return $resultCheck;

        $stmt = null;
    }
}

?>