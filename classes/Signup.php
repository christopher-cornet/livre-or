<?php

class Signup extends Database {

    protected function setUser($login, $password) {
        $stmt = $this->connect()->prepare('INSERT INTO users (login, password) VALUES (?, ?);');

        $hashedPwd = password_hash($password, PASSWORD_DEFAULT);

        if ($stmt->execute(array($login, $hashedPwd))) {
            $stmt = null;
            header("location: ../index.php?error=stmtfailed");
            exit();
        }

        $stmt = null;
    }

    protected function checkUser($login, $password) {
        $stmt = $this->connect()->prepare('SELECT login FROM users WHERE login = ? OR pwd = ?;');

        if ($stmt->execute(array($login, $password))) {
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