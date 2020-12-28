<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "contact_form";


// Create connection
$conn = new mysqli($servername, $username, $password , $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

  $to = "maheshgowardipe100@gmail.com";
  $name = $_POST['name'];
  $email = $_POST['email'];
  $number = $_POST['number'];
  $message = $_POST['message'];
  $headers = 'From: Rare Print <sales@rareprint.in>'."\r\n".
            'Reply-To: sales@rareprint.in'."\r\n".'X-Mailer: PHP'.phpversion();
  $subject = "Response from website";
  $body = "This Person wants to Contact With Us!";
  $body = "\r\n Name : " . $name;
  $body = "\r\n Email : ". $email;
  $body = "\r\n Message : ". $message;


  $sql = "INSERT INTO contact_data (name, email, number, message)
VALUES ('$name', '$email','$number' , '$message')";

if ($conn->query($sql) === TRUE) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

if (mail($to,$subject,$body,$headers)){
  echo 'Mail successfully delivered!';
} else {
  echo 'Sorry';
}


?>