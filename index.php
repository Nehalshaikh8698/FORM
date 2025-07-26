<?php
$insert = false;
if(isset($_POST['name'])){

$server ="localhost";
$username = "root";
$password = "";

$con = mysqli_connect($server, $username, $password);

if(!$con){
    die("connection to this databse failed due to ".
    mysqli_connect_error());
}
// echo "Success connecting to the db"

$name=$_POST['name'];
$gender=$_POST['gender'];
$age = $_POST['age'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$desc = $_POST['desc'];

$sql =  "INSERT INTO `trip_form`.`trip` ( `name`, `age`, `gender`, `email`, `phone`, `other`, `dt`) 
     VALUES ('$name', '$age', '$gender', '$email', '$phone', '$desc', 
     current_timestamp());";

    //  echo $sql;

if($con->query($sql) == true){
    // echo " Successfully Inserted";
    $insert = true;


}     
else{
    echo "ERROR: $sql <br> $con->error";
}
$con->close();
}
?>



<!-- html -->

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Welcome To Travel Form</title>
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Intel+One+Mono:ital,wght@0,300..700;1,300..700&display=swap" rel="stylesheet">
  </head>
  <body>
    <img class="bg" src="bg.jpg" alt="DYPCOE">
    <div class="container">
        <h1>Welcome to US trip Form </h1>
        <p>Enter Your Details</p>
        <?php
        if($insert == true){
         echo " <p class='submitmsg'>thanks for submiting form</p> ";
        }
?>
          <form action="index.php" method="post">
        <input type="text" 
        name="name"
        id="name"
        placeholder="Enter Your Name"
        >
         <input type="text" 
        name="age"
        id="age"
        placeholder="Enter Your Age"
        >
          <input type="text" 
        name="gender"
        id="gender"
        placeholder="Enter Your Gender"
        >
          <input type="text" 
        name="email"
        id="email"
        placeholder="Enter Your Email"
        >
          <input type="phone" 
        name="phone"
        id="phone"
        placeholder="Enter Your Phone Number"
        >
        <textarea
        name="desc"
        id="desc"
        cols="30"
        rows="10"
        placeholder="Enter More Details"
        >
        </textarea>
        <button class="btn">Submit</button>
    </form>
    </div>
    <script src="index.js"></script>

  </body>
</html>