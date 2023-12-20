<?php

class dbconn
{
    public $localhost = "localhost";
    public $username = "root";
    public $password = "";
    public $dbname = "harleyshop";
    public $conn;

    public function __construct()
    {
        $this->conn = new mysqli($this->localhost, $this->username, $this->password, $this->dbname);

        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
        else{
            return $this->conn;
        }
    }

    public function table()
    {
        $sql = "CREATE TABLE IF NOT EXISTS foods(
            food_id INT AUTO_INCREMENT PRIMARY KEY,
            shop_name VARCHAR(255) NOT NULL,
            food_image VARCHAR(255) NOT NULL,
            categorie VARCHAR(255) NOT NULL,
            discount_price FLOAT(10) NOT NULL,
            original_price FLOAT(10) NOT NULL,
            description VARCHAR(255) NOT NULL),
            -- reges_id INT(6) UNSIGNED,
            -- FOREIGN KEY (reges_id) REFERENCES reges(reges_id)";
            

        if ($this->conn->query($sql)) {
            // echo "successfully created";
        } else {
            echo "not created";
        }
    }
//     public function createForeignKey()
// {
//     $sql = "ALTER TABLE foods 
//             ADD CONSTRAINT fk_reges_id 
//             FOREIGN KEY (reges_id) 
//             REFERENCES reges(id)";

//     if ($this->conn->query($sql)) {
//         echo "Foreign key created successfully";
//     } else {
//         echo "Failed to create foreign key: " . $this->conn->error;
//     }
// }

      public function table1()
    {
        $sql = "CREATE TABLE IF NOT EXISTS user(
            user_id INT AUTO_INCREMENT PRIMARY KEY,
            username VARCHAR(255) NOT NULL,
            email VARCHAR(255) NOT NULL,
           address VARCHAR(255) NOT NULL,
           password VARCHAR(25) NOT NULL,
           cpassword VARCHAR(25) NOT NULL)";

        if ($this->conn->query($sql)) {
             echo "successfully created";
        } else {
            echo "not created";
        }
    }
public function table2()
{
    $sql = "CREATE TABLE `order` (  
        order_id INT AUTO_INCREMENT PRIMARY KEY,
        user_id INT,
        reges_id INT,
        username VARCHAR(255) NOT NULL,
        address VARCHAR(255) NOT NULL,
        quantity INT NOT NULL,
        total_cost DECIMAL(10, 2) NOT NULL,
        status VARCHAR(255) NOT NULL,
        food_id INT NOT NULL,  -- Add a new column for food id
        food_image VARCHAR(255) NOT NULL,
        food_name  VARCHAR(255) NOT NULL,
        order_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    )";

    if ($this->conn->query($sql)) {
        echo "Successfully created the order table";
    } else {
        echo "Failed to create the order table: " . $this->conn->error;
    }
}



public function insert($reges_id,$name, $targetPath, $food, $Categorie, $price, $price1, $description )
{
    $insert = "INSERT INTO foods (reges_id,shop_name, food_image, food_name, categorie, discount_price, original_price, description ) VALUES ('$reges_id','$name', '$targetPath', '$food', '$Categorie', '$price', '$price1', '$description' )";
        $result = $this->conn->query($insert);
    
    if ($result) {
        echo "Record inserted successfully";
        header('Location: shopdash.php');
        exit();
    } else {
        echo "Error: " . $this->conn->error;
    }
}

  public function insertuser( $username, $email, $address, $password, $cpassword)
{
    $insert1 = "INSERT INTO user ( username, email, address, password, cpassword)
                VALUES ( '$username', '$email', '$address', '$password', '$cpassword')";

    $result1 = $this->conn->query($insert1);
   
    if ($result1) {
        echo "Record inserted successfully";
        header('Location: userlog.php');
        exit();
    } else {
        echo "Error: " . $this->conn->error;
    }
}


  
     public function select()
    {

        $id= $_SESSION['id'];
        $select = "SELECT * FROM foods where $id=reges_id";
        $result = $this->conn->query($select);
        return $result;
    }

     public function select1()
    {
        
        // $id= $_SESSION['id'];
        $select = "SELECT * FROM foods";
        $result = $this->conn->query($select);
        return $result;
    }


     public function select2()
    {
       
          $select = "SELECT * FROM foods,reges WHERE foods.reges_id=reges.reges_id ";
        $result = $this->conn->query($select);
        return $result;
    }

      public function user()
    {
        $select1 = "SELECT * FROM user";
        $result1 = $this->conn->query($select1);
        return $result1;    
    }
      public function admin()
    {
        $select2 = "SELECT * FROM reges";
        $result2 = $this->conn->query($select2);
        return $result2;
    }

   public function order()
{
    $select = "SELECT * FROM `order`"; // Use backticks around "order"
    $result = $this->conn->query($select);

    if ($result === false) {
        die("Error executing the query: " . $this->conn->error);
    }

    return $result;
}

    

public function userselect($username, $password)
{
    $select = "SELECT * FROM user WHERE username='".$username."' AND password='".$password."'";
       $result = $this->conn->query($select);
        return $result;
   
}


public function userselect1()
{
    $select = "SELECT * FROM user ";
    $result = $this->conn->query($select);
    return $result;
   

}


}


 // $onw= new dbconn();
 // $onw->table2();



   // $obj = new dbconn();
   // $obj->table2();
  //$ob->select();

 //$new= new dbconn();
// $new->select();
?>
