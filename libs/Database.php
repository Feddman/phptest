<?php
/**
 * Created by PhpStorm.
 * User: Fedde
 * Date: 28-10-14
 * Time: 17:55
 */

class Database {

    private $dbname;
    private $password = '';
    private $username = 'root';
    private $host = 'localhost';
    private $error;

    private $stmt;
    private $conn;

    public function __construct($dbname) {
        $this->dbname = $dbname;
        try {
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->dbname, $this->username, $this->password );
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $e) {
            $this->error = $e->getMessage();
        }
    }

    public function query($query) {
        $this->stmt = $this->conn->prepare($query);
    }

    public function bind($param, $value) {
        $this->stmt->bindParam($param, $value);
    }

    public function getAll() {
        $this->stmt->execute();
        return $this->stmt->fetchAll(PDO::FETCH_OBJ);
    }





    // methods:

    // connectie maken
    // query kunnen maken
    // errors tonen
    // query uitvoeren
    // parameters binden
    // Alles fetchen
    // een item fetchen
}
