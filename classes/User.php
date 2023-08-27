<?php

include "Database.php";

class User {

    public $id;
    public $email;
    private $pdo;

    function __construct($email)
    {
        $this->email = $email;
        $this->pdo = new Database();
    }

    // Register the User
    public function register($username, $password) {
        
        // Get all the users in the Database
        $req = $this->pdo->db->prepare( "SELECT * FROM users WHERE email = ?" );

        // Executes a prepared statement by passing it an array containing the value ​​of the parameter
        $req->execute( [$this->email] );

        // If $user is not empty return False
        $user = $req->fetch();
        
        // If $user is empty add the User to the Database if the form is valid
        if(empty($user)) {
            $req = $this->pdo->db->prepare( "INSERT INTO users (username, email, password) VALUES (?,?,?)" );
            $req->execute( [$username, $this->email, hash("sha256", $password)] );
            return true;
        }
        
        return false;
    }

    // Log In the User
    public function connect($password) {


        $req = $this->pdo->db->prepare( "SELECT * FROM users WHERE email = ? AND password = ?" );
        $req->execute( [$this->email, hash("sha256", $password)] );
        $user = $req->fetch();
        
        // If $user contains a value, define session values
        if ($user) {

            $_SESSION["email"] = $user["email"];
            $_SESSION["username"] = $user["username"];
            
            return true;

        }
        
        // Else if $user do not contains any value, reset session values
        $_SESSION["email"] = "";
        $_SESSION["username"] = "";

        return false;
    }
}

?>