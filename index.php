<?php
$insert = false;
if (isset($_POST['name'])) {

    $server = "localhost";
    $username = "root";
    $password = "";

    $con = mysqli_connect($server, $username, $password);

    if (!$con) {
        die("Connection to this database failed due to " . mysqli_connect_error());
    }

    $name   = $_POST['name'];
    $gender = $_POST['gender'];
    $age    = $_POST['age'];
    $email  = $_POST['email'];
    $phone  = $_POST['phone'];
    $desc   = $_POST['desc'];

    $sql = "INSERT INTO `trip_form`.`trip` (`name`, `age`, `gender`, `email`, `phone`, `other`, `dt`) 
            VALUES ('$name', '$age', '$gender', '$email', '$phone', '$desc', current_timestamp());";

    if ($con->query($sql) == true) {
        $insert = true;
    } else {
        echo "ERROR: $sql <br> $con->error";
    }

    $con->close();
}
?>

<!-- HTML -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Let's Connect!</title>
    <link rel="stylesheet" href="style.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=Intel+One+Mono:ital,wght@0,300..700;1,300..700&display=swap" rel="stylesheet">
    <link rel="icon" type="image/png" sizes="32x32" href="favicon-32x32.png">

</head>
<body>
    <img class="bg" src="bg.jpg" alt="DYPCOE">

    <?php if ($insert == true): ?>
        <div class="submit-msg">
            <p class="submitmsg">🎉 Thank you for submitting your details! We’ll be in touch soon.</p>
        </div>
    <?php else: ?>
        <div class="container">
            <h1>Want to connect? Just share your basic details below</h1>
            <p>Tell us a little about yourself to begin the journey</p>

            <form action="index.php" method="post">
                <input type="text" name="name" id="name" placeholder="Enter Your Name">
                <input type="text" name="age" id="age" placeholder="Enter Your Age">
                <input type="text" name="gender" id="gender" placeholder="Enter Your Gender">
                <input type="text" name="email" id="email" placeholder="Enter Your Email">
                <input type="phone" name="phone" id="phone" placeholder="Enter Your Phone Number">
                <textarea name="desc" id="desc" cols="30" rows="10" placeholder="Enter More Details"></textarea>
                <button class="btn">Submit</button>
            </form>
        </div>
    <?php endif; ?>

    <script src="index.js"></script>
</body>
</html>
