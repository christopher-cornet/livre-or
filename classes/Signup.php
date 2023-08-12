<?php

class Signup extends Database {

    // Register the User in the Database
    protected function setUser($login, $password) {
        $stmt = $this->connect()->prepare('INSERT INTO users (id, login, password) VALUES (?, ?, ?);');
        echo "registered";

        $hashedPwd = password_hash($password, PASSWORD_DEFAULT);

        if ($stmt->execute(array('', $login, $hashedPwd))) {
            $stmt = null;
            header("location: ../index.php?error=stmtfailed");
            exit();
        }

        $stmt = null;
    }

    protected function checkUser($login) {
        $stmt = $this->connect()->prepare('SELECT login FROM users WHERE login = ?;');

        if ($stmt->execute(array($login))) {
            $stmt = null;
            header("location: ../index.php?error=stmtfailed");
            exit();
        }

        $resultCheck;
        if ($stmt->rowCount() > 0) {
            $resultCheck = false;
        }
        else {
            $resultCheck = true;
        }

        return $resultCheck;
    }
}

?>