<?php

session_start();
echo "here";

$name = $_POST["name"];
#echo "here 1";
#echo "name is".$name;
$email = $_POST["email"];
echo "email is".$email;
$phone = $_POST["tel"];
#echo "the phone is".$phone;

$usermessage = $_POST["yourMessage"];
#echo "the message is".$usermessage;







if (!empty($_POST)) {
    $conn = new mysqli("localhost:3306", "sasa28_data", "sayed39986870", "sasa28_database");
    if ($conn->connect_error) {
        die("connection failed: " . $conn->connect_error);
    }
    $sql = "INSERT INTO contact(name, email, phone, message) VALUES ('$name', '$email', '$phone ', '$usermessage')";
    $result = mysqli_query($conn, $sql);
    if ($result) echo "the database have recievd the message"; else 
    {echo "error could not add the record   ".mysqli_error($conn);}
    mysqli_close($conn);
    #echo "An account has been created";
   
}

?>