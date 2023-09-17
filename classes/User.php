<?php

include "Database.php";

class User {

    public $email;
    private $pdo;

    function __construct($email) {
        $this->email = $email;
        $this->pdo = new Database();
    }

    // Register the User
    public function register($username, $password) {
        
        // Get all the Emails in the Database where the Email = $this->email
        $query = $this->pdo->db->prepare( "SELECT * FROM users WHERE email = ?" );
        $query->execute( [$this->email] );

        // If $user is not empty return False
        $user = $query->fetch();
        
        // If $user is empty add the User to the Database if the form is valid
        if(empty($user)) {
            $query = $this->pdo->db->prepare( "INSERT INTO users (username, email, password) VALUES (?,?,?)" );
            $query->execute( [$username, $this->email, hash("sha256", $password)] );
            return true;
        }
        
        return false;
    }

    // Log In the User
    public function connect($password) {

        // Authenticate the User based on the email and password
        $query = $this->pdo->db->prepare( "SELECT * FROM users WHERE email = ? AND password = ?" );
        $query->execute( [$this->email, hash("sha256", $password)] );
        $user = $query->fetch();
        
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

    // Add a Comment to the Golden Book
    public function addComment($comment, $username) {

        // $date = new DateTime();
        // $dateFormat = $date->format('Le %d/%m/%Y, à %H:%i:%S');

        // Add the Comment to the Database
        $query = $this->pdo->db->prepare( "INSERT INTO comments (comment, username, date) VALUES (?,?,CURRENT_TIMESTAMP)" );
        $query->execute( [$comment, $username] );

        if ($query->rowCount() > 0) {
            echo "Votre commentaire a été ajouté.";
        } else {
            echo "<b>Erreur</b><br>Votre commentaire n'a pas été ajouté.";
        }

    }

    // Edit User's Profile
    public function editProfile($password) {

    }
}

?>
