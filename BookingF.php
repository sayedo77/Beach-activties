<?php

session_start();

echo "The looged user is ".$_SESSION["Username"];
//echo "The type is ".$_SESSION["type"];
echo "<br>";
$userName = $_SESSION["Username"];
$Name = $_POST["name"];
$Email = $_POST["email"];
$_SESSION["Emails"] = $Email;
$Phone = $_POST["phone"];
$People = $_POST["people"];
$Date = date('Y-m-d', strtotime($_POST["date"]));
$Time = $_POST ["time"];
$Message = $_POST ["message"];
$Type = $_POST ["type"];
$_SESSION["type"] = $_POST ["type"];
echo $_SESSION["type"];
//$Type = $_SESSION["type"];
$Hours = $_POST ["hours"];
$price = 10;
//$price = $_SESSION [10];
//$Type = $_POST ["type"];
if(isset($_POST['boating'])) {
    //echo "boating";
    $EventType = "Boating";
//$_SESSION["type"] = $EventType;
    
    //echo $Type;
    if ($Type == "public"){ 
         $price = 50;}
    else
      if ($Type == "private"){ $price = 200;}
    //echo $price;
}
if (isset($_POST['Jetskis'])) {
    //echo "boating";
    $EventType = "Jetskis";
    //$_SESSION["type"] = $EventType;
    
    $price = $people * 60;
    if ($People<= 3) $price = $People * 60 * $Hours;
    else $price = $People * 30 * $Hours;
}
//else {echo "no Jetskis";}
if (isset($_POST['Beach'])) {
    //echo "boating";
    $EventType = "Beach";
   // $_SESSION["type"] = $EventType;
    $price = $People * 20;
}
//else {echo "Beach";}
if (isset($_POST['Diving'])) {
    //echo "boating";
    $EventType = "Diving";
    //$_SESSION["type"] = $EventType;
    $price = $people * 130;
    if ($People<= 3) $price = $People * 130;
    else $price = $People * 100;
}
//else {echo "no Diving";}
if (isset($_POST['Padel'])) {
    //echo "boating";
    $EventType = "Padel";
   // $_SESSION["type"] = $EventType;
    $price = $Hours * 30;
}
//else {echo "no Padel";}
if (isset($_POST['RESTAURANT'])) {
    //echo "boating";
    $EventType = "RESTAURANT";
//$_SESSION["type"] = $EventType;
    $price = 10;
}
//else {echo "no RESTAURANT";}

$_SESSION["price"] = $price;
$_SESSION["type"] = $EventType;
$_SESSION["date"] = $Date;
$_SESSION["time"] = $Time;
//echo "the price is". $price;



  


if (!empty($_POST)) {
    $conn = new mysqli("localhost:3306", "sasa28_data", "sayed39986870", "sasa28_database");
    if ($conn->connect_error) {
        die("connection failed: " . $conn->connect_error);
    }
    $sql = "INSERT INTO Booking (name, email, phone, people, date, time, message, EventType, type, hours, UserName) VALUES ('$Name', '$Email', '$Phone', '$People', '$Date', '$Time', '$Message', '$EventType', '$Type', '$Hours', '$userName')";
     $result = mysqli_query($conn, $sql);
    //if ($result) echo "the database have recievd the message"; else 
    //{echo "error could not add the record   ".mysqli_error($conn);}
    mysqli_close($conn);

    
   
}

?>

<head>
  <meta charset="UTF-8">
  <title>Bahrain Beach - Payment Form</title>
  <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css'><link rel="stylesheet" href="./style.css">

</head>
<body>
<!-- partial:index.partial.html -->
<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">

<div class="container">
  <div id="Checkout" class="inline">
      <h1>Pay Invoice</h1>
      <div class="card-row">
          <span class="visa"></span>
          <span class="mastercard"></span>
          <span class="amex"></span>
          <span class="discover"></span>
      </div>
      <form action="payment.php" method="post">
          <div class="form-group">
              <label for="PaymentAmount">Payment amount</label>
              <div class="amount-placeholder">
                  <span>BD</span>
                  <span><?php echo $price ?></span>
              </div>
          </div>
          <div class="form-group">
              <label or="NameOnCard">Name on card</label>
              <input id="NameOnCard" name="name" class="form-control" type="text" maxlength="255"></input>
          </div>
          <div class="form-group">
              <label for="CreditCardNumber">Card number</label>
              <input id="CreditCardNumber" name="card" class="null card-image form-control" type="text"></input>
          </div>
          <div class="expiry-date-group form-group">
              <label for="ExpiryDate">Expiry date</label>
              <input id="ExpiryDate" name="expiry" class="form-control" type="text" placeholder="MM / YY" maxlength="7"></input>
          </div>
          <div class="security-code-group form-group">
              <label for="SecurityCode">CVV Number</label>
              <div class="input-container" >
                  <input id="SecurityCode" name="cvv" class="form-control" type="text" ></input>
                  <i id="cvc" class="fa fa-question-circle"></i>
              </div>
              <div class="cvc-preview-container two-card hide">
                  <div class="amex-cvc-preview"></div>
                  <div class="visa-mc-dis-cvc-preview"></div>
              </div>
          </div>
          <div class="zip-code-group form-group">
              <label for="ZIPCode">ZIP Code</label>
              <div class="input-container">
                  <input id="ZIPCode" name="zip" class="form-control" type="text" maxlength="10"></input>
                  <a tabindex="0" role="button" data-toggle="popover" data-trigger="focus" data-placement="left" data-content="Enter the ZIP/Postal code for your credit card billing address."><i class="fa fa-question-circle"></i></a>
              </div>
          </div>
          <button id="PayButton" class="btn btn-block btn-success submit-button" type="submit">
              <span class="submit-button-lock"></span>
              <span class="align-middle">Pay BD <?php echo $price ?></span>
          </button>
      </form>
  </div>
</div>


</body>
</html>
