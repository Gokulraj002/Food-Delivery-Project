 <?php
    session_start();
    class Database
{
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

    public function checkLogin($username, $password)
    {
        // Prevent SQL injection
        $username = $this->conn->real_escape_string($username);
        $password = $this->conn->real_escape_string($password);
       
        $sql = "SELECT * FROM reges WHERE ownername = '$username' AND password = '$password' ";
        $result = $this->conn->query($sql);
        $rows=mysqli_num_rows($result);
 if ($rows == 1) {
            $row = $result->fetch_assoc();
            $_SESSION['username'] = $row['ownername']; 
             $_SESSION['id'] = $row['reges_id'];
             $_SESSION['photo'] = $row['profile_photo'];
             $_SESSION['shop']=$row['shopname'];

            return true;
        } else {
            // User not found or incorrect credentials
            return false;
        }
    }

 //    public function checkLogin1()
 //    {
 //        $sql = "SELECT * FROM reges ";
 //        $result = $this->conn->query($sql);
        
 // if ($result && $result->num_rows >0) {
 //            $row = $result->fetch_assoc();
 //            $_SESSION['username'] = $row['ownername']; 
 //            $_SESSION['regesid'] = $row['reges_id'];
 //            $_SESSION['photo'] = $row['profile_photo'];
 //            $_SESSION['shop']=$row['shopname'];

 //            return true;
 //        } else {
 //            // User not found or incorrect credentials
 //            return false;
 //        }
 //    }
}

// ... (existing code)
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "harleyshop";

$db = new Database($servername, $username, $password, $dbname);
// Example usage for login check
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['Password'];

    // Check login credentials
    $loginSuccessful = $db->checkLogin($username, $password);

    if ($loginSuccessful) {
        // Redirect to a dashboard or home page
        header('Location:shopdash.php');
    } else {
        echo "Login failed. Invalid username or password.";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Harley Foods</title>
  <link rel="icon" href="https://www.shutterstock.com/shutterstock/photos/2052869804/display_1500/stock-vector-fast-food-circle-frame-design-with-appetizing-hamburger-sandwich-and-pizza-slice-vector-template-2052869804.jpg" >
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">  
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
  <style type="text/css"></style>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link href='https://fonts.googleapis.com/css?family=Grand Hotel' rel='stylesheet'>

    </head>
        

   <style>

       body{
        background-image: url(https://i.pinimg.com/564x/9c/0f/10/9c0f102ff1f4578232052ac967b56459.jpg);
        background-size: 100% 100%;
        background-attachment: fixed;
        background-repeat: no-repeat 
       }
   
   </style>


<body>



    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6 shadow-lg p-3">
                <h2 class="mb-4 text-white text-center"> SHOP LOGIN</h2>
                <form action="" method="post">
                    <div class="mb-3">
                        <label for="name" class="form-label text-info">USER NAME:</label>
                        <input type="text" class="form-control rounded-0" id="name" name="username" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label text-info">PASSWORD</label>
                        <input type="Password" class="form-control rounded-0" id="password" name="Password" required>
                    </div>
                    
                    <button type="submit" class="btn btn-dark">Login</button>
                    <p class="link text-white">Don't have an account? <a href='shopreg.php' class="text-info">Registration Now</a></p>

                </form>
            </div>
        </div>
    </div>
    
    
</body>
</html>
