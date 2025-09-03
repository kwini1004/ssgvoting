<?php
error_reporting(0);
include "includes/all-select-data.php";

$count = mysqli_num_rows($voter_data);

if (isset($_POST['register'])) {
    $con = mysqli_connect("localhost", "root", "", "voting");

    // Sanitize user input
    $fname      = $_POST['fname'];
    $lname      = $_POST['lname'];
    $idname     = $_POST['idname'];
    $idnum      = $_POST['idnum'];
    $instidnum  = $_POST['instidnum'];
    $dob        = $_POST['dob'];
    $gender     = $_POST['gender'];
    $phone      = $_POST['phone'];
    $address    = $_POST['address'];

    $dateOfBirth = new DateTime($dob);
    $currentDate = new DateTime();
    $age = $dateOfBirth->diff($currentDate)->y;

    // Validation
    if (strlen($phone) != 10 || !is_numeric($phone)) {
        showAlert("Phone Number must be exactly 10 digits and numeric");
    } elseif (strlen($idnum) > 13) {
        showAlert("Enter a valid ID number (max 13 digits)");
    } elseif ($age < 18) {
        showAlert("You must be at least 18 years old to register");
    } else {
        $filename = $_FILES["idcard"]["name"];
        $tempname = $_FILES["idcard"]["tmp_name"];
        $folder = "img/" . $count . $filename;

        if (move_uploaded_file($tempname, $folder)) {
            $query = "INSERT INTO register 
                        (fname, lname, idname, idnum, idcard, inst_id, dob, gender, phone, address, status)
                      VALUES 
                        ('$fname', '$lname', '$idname', '$idnum', '$folder', '$instidnum', '$dob', '$gender', '$phone', '$address', 'not voted')";

            $data = mysqli_query($con, $query);

        +
                showAlert("Registration Successfully!", "index.php");
          
        } else {
            showAlert("Failed to upload ID card. Please try again.");
        }
    }
}

function showAlert($message, $redirect = null) {
    echo "<script>
            alert('$message');
            " . ($redirect ? "location.href='$redirect';" : "history.back();") . "
          </script>";
}
?>
