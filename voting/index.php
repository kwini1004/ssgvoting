<?php
session_start();
session_destroy();
error_reporting(0);
$_SESSION['userLogin'] = 0;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SSG Voting System</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <div class="container">
        <div class="heading">
            <h1 style="color: black;">SSG Voting System</h1>
        </div>

        <div class="form">
            <h4>Voter Login</h4>
            <form action="login.php" method="POST">
                <label class="label">Student Number :</label>
                <input type="text" name="idnum" class="input" placeholder="Enter Student Number" required>

                <label class="label">Password :</label>
                <input type="password" name="password" class="input" placeholder="Enter Password" required>

                <button class="button" name="login">Login</button>

                <div class="link1">New user ? <a href="registration.php">Register here</a></div>
            </form>

            <p class="error"><?php echo $_SESSION['error'] ?? ''; ?></p>
        </div>
    </div>
</body>
</html>
