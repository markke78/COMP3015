<?php 
// Start the session
session_start();

if($_SESSION['authenticated'] == false){
    header('Location: login.php');
    exit;
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage</title>
</head>
<body>
    <h1>Welcome to the homepage</h1>
    <p>You are logged in as <?php echo $_SESSION['email']; ?></p>
</body>
</html>
