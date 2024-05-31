<?php  
// Check if the form is submitted  
if ($_SERVER['REQUEST_METHOD'] === 'POST') {  
    // Retrieve the username and password from the form  
    $username = $_POST['username'];  
    $password = $_POST['password'];  
  
    // Retrieve the database credentials from environment variables  
    $servername = getenv('DB_SERVER');  
    $db_username = getenv('DB_USERNAME');  
    $db_password = getenv('DB_PASSWORD');  
    $database = getenv('DB_NAME');  
  
    // Connect to the MySQL database server  
    $conn = new mysqli($servername, $db_username, $db_password, $database);  
    if ($conn->connect_error) {  
        die("Connection failed: " . $conn->connect_error);  
    }  
  
    // Insert the username and password into the database  
    $sql = "INSERT INTO users (username, password) VALUES ('$username', '$password')";  
  
    if ($conn->query($sql) === TRUE) {  
        echo "User data stored successfully!";  
    } else {  
        echo "Error: " . $sql . "<br>" . $conn->error;  
    }  
  
    // Close the database connection  
    $conn->close();  
}  
?>  
