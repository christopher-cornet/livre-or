<?php

class Database {
    public function __construct() {
        $db = new PDO ('mysql:host=localhost; dbname=livreor', 'root', '');
    }
}

$database = new Database;

?>