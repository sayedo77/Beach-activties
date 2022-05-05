<?php
    session_start();
     #header("Location: http://sasa28.brighton.domains/project/Home.html");
     
     
     if (!empty($_POST)) {
        $conn = new mysqli("localhost:3306", "sasa28_data", "sayed39986870", "sasa28_database");
        #echo "here";
        if ($conn->connect_error) {
            die("connection failed: " . $conn->connect_error);}
            
        }
        $sql = "SELECT Password, Username FROM websitedata";
        $result = mysqli_query($conn, $sql);
        
        while ($record = mysqli_fetch_assoc($result)) {
             // echo "user name is  ".$record["Username"];
              //echo "<br>";
              //echo "inputed user name is ".$_POST["uname"];
              //echo "<br>";
            if (( $record["Password"] == md5($_POST['psw'])) && ($_POST["uname"]== $record["Username"])) {
                $_SESSION["status"] = "loggedin";
                //echo  $record ["Username"];
                $_SESSION["Username"]= $record["Username"];
                //$_SESSION[10]= $record[10];
                //$price = $_SESSION [10];
                //$_SESSION["type"]= $record["type"];

                header("Location: https://sasa28.brighton.domains/FinalProject/Activites.html");
                echo "Login success";
                echo "<br>";
                exit();}
               // echo $_POST["username"]." ".$record["Username"].$record["Password"];
                //echo "<br>";
                
        } 
         echo "<br>";
         echo "the user name or the password is wrnog please try again ";
?>