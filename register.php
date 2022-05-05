<?php

session_start();

$Firstname = $_POST["fname"];
$Lastname = $_POST["lname"];
$Age = $_POST["age"];
$Email = $_POST["email"];
$Gender = $_POST["gender"];
$Username = $_POST["username"];
$Password = $_POST["password"];
$passwordHash = md5($Password);




if (!empty($_POST)) {
    $conn = new mysqli("localhost:3306", "sasa28_data", "sayed39986870", "sasa28_database");
    if ($conn->connect_error) {
        die("connection failed: " . $conn->connect_error);
    }
    $sql = "INSERT INTO websitedata (Firstname, Lastname, Age, Email, Gender, Username, Password) VALUES ('$Firstname', '$Lastname', '$Age', '$Email', '$Gender', '$Username', '$passwordHash')";
     #$sql = "INSERT INTO websitedata (Firstname) VALUES ('$Firstname')";
    $result = mysqli_query($conn, $sql);
    if ($result) header("Location: http://sasa28.brighton.domains/FinalProject/login.html"); else 
    {echo "error could not add the record   ".mysqli_error($conn);}
    mysqli_close($conn);
    #echo "An account has been created";
   
}

?>