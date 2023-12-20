<?php

class Database
{
    private $conn;
    private $servername;
    private $username;
    private $password;
    private $dbname;

    public function __construct($servername, $username, $password, $dbname)
    {
        $this->servername = $servername;
        $this->username = $username;
        $this->password = $password;
        $this->dbname = $dbname;

        // Create connection
        $this->conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);

        // Check connection
        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
    }

    public function createTable()
    {
        $sql = "CREATE TABLE IF NOT EXISTS reges (
            reges_id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            ownername VARCHAR(255) NOT NULL,
            shopname VARCHAR(255) NOT NULL,
            email VARCHAR(255) NOT NULL,
            address VARCHAR(255) NOT NULL,
            password VARCHAR(255) NOT NULL,
            cpassword VARCHAR(255) NOT NULL,
            phonenumber VARCHAR(15) NOT NULL,
            profile_photo VARCHAR(255) NOT NULL
        )";

        if ($this->conn->query($sql) === TRUE) {
            echo "Table 'reges' created successfully.<br>";
        } else {
            echo "Error creating table: " . $this->conn->error . "<br>";
        }
    }

    public function insertData($ownername, $shopname, $email, $address, $password, $cpassword, $phonenumber, $profile_photo)
    {
        $sql = "INSERT INTO reges (ownername, shopname, email, address, password, cpassword, phonenumber, profile_photo)
            VALUES ('$ownername', '$shopname', '$email', '$address', '$password', '$cpassword', '$phonenumber', '$profile_photo') ";

        if ($this->conn->query($sql)) {
            header('Location:shoplog.php');
        } else {
            echo "Error inserting data: " . $this->conn->error . "<br>";
        }
    }

    public function closeConnection()
    {
        $this->conn->close();
    }
}

// Example usage
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "harleyshop";

// Create a new Database instance
$db = new Database($servername, $username, $password, $dbname);

// Create the 'reges' table
$db->createTable();

?>
