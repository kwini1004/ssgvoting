<?php
session_start();
include "db.php"; // <-- make sure this file has your DB connection

if (isset($_POST['login'])) {
    $idnum = mysqli_real_escape_string($con, $_POST['idnum']); 
    $password = mysqli_real_escape_string($con, $_POST['password']); 

    // Fetch user by student number
    $reg_query = "SELECT * FROM register WHERE idnum='$idnum'";
    $reg_data = mysqli_query($con, $reg_query);
    $result = mysqli_fetch_assoc($reg_data);

    if ($result) {
        // Check password (assuming you used password_hash during registration)
        if (password_verify($password, $result['password'])) {

            if ($result['verify'] == "yes") {
                // Set session values
                $_SESSION['fname']   = $result['fname'];
                $_SESSION['lname']   = $result['lname'];
                $_SESSION['idnum']   = $result['idnum'];
                $_SESSION['idcard']  = $result['idcard'];
                $_SESSION['status']  = $result['status'];
                $_SESSION['verify']  = $result['verify'];
                $_SESSION['userLogin'] = 1;

                echo "<script>
                        alert('Login Successful!');
                        location.href='dashboard.php';
                      </script>";
            } else {
                echo "<script>
                        alert('You are not verified by Admin');
                        location.href='index.php';
                      </script>";
            }

        } else {
            echo "<script>
                    alert('Invalid password');
                    history.back();
                  </script>";
        }
    } else {
        echo "<script>
                alert('Student number not registered');
                history.back();
              </script>";
    }
}
?>
