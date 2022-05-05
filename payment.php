<?php


session_start();
$userName = $_SESSION["Username"];
$Type = $_SESSION["type"];
$Time = $_SESSION["time"];
//echo $Type;
$price = $_SESSION ["price"];
$Date = $_SESSION ["date"];
$Name = $_POST["name"];
$Card = $_POST["card"];
$Expiry = $_POST["expiry"];
$CVV = $_POST["cvv"];
$Zip = $_POST["zip"];


//echo "the plain text is".$ciphertext;
//echo "the plain text is".$ciphercard;
//echo "the plain text is".$ciphercvv;


$cipher = "aes-128-gcm";

$key = "mysecretkey";

$ivlen = openssl_cipher_iv_length($cipher);
$iv = openssl_random_pseudo_bytes($ivlen);
$ciphertext = openssl_encrypt($Expiry, $cipher, $key, $options=0, $iv, $tag);
$ciphercard = openssl_encrypt($Card, $cipher, $key, $options=0, $iv, $tag);
$ciphercvv = openssl_encrypt($CVV, $cipher, $key, $options=0, $iv, $tag);


//echo "----- the encrypted text is ".$ciphertext;

 if (!empty($_POST)) {
    $conn = new mysqli("localhost:3306", "sasa28_data", "sayed39986870", "sasa28_database");
    if ($conn->connect_error) {
        die("connection failed: " . $conn->connect_error);
    }
    $sql = "INSERT INTO Payment (name, card, expiry, cvv, zip, UserName, Price, Type) VALUES ('$Name', '$ciphercard', '$ciphertext', '$ciphercvv', '$Zip','$userName', '$price','$Type')";
    //echo "An account has been created";
     $result = mysqli_query($conn, $sql);
    //if ($result) echo "the database have recievd the message"; else 
    //{echo "error could not add the record   ".mysqli_error($conn);}
    mysqli_close($conn);
   
    
   
}

mail($_SESSION["Emails"],"Beach Activities Bahrain","The username ".$_SESSION["Username"]." has booked ". $_SESSION["type"]. " activity".".". " The price is ". $_SESSION ["price"]. "BD".".". " The day of reservation is ".     $_SESSION ["date"].".". " The time of reservation is ". $_SESSION["time"] );

?>

<!DOCTYPE html>
<html>
<head>
<title>Booking Cofirmation</title>
</head>
<body>

<h1>your booking have been sent in your email</h1>
<p></p>

</body>
</html>



