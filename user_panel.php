<?php
session_start();

if(!isset($_SESSION["username"])){
    header("Locations logout.php");
    exit;

}

$username = $_SESSION["username"] ;
$role = $_SESSION["role"] ;

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>User Panel</title>
</head>
<body>
    <div class="panel">
        <h1>Welcome, <?php echo htmlspecialchars($username); ?>!</h1>
        <p>Your role: <strong><?php echo htmlspecialchars($role); ?></strong></p>
        <p>This is your user panel. You can customize this page to show personal data, settings, or other features.</p>
        <a href="logout.php">Log Out</a>
    </div>
</body>
</html>