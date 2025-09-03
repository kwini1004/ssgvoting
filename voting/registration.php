<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online Voting System</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
   <div class="container">
        <div class="heading"><h1>Online Voting System</h1></div>
        <form action="register_data.php" method="POST" enctype="multipart/form-data">
            <div class="form">
                <h4>Voter Registraton</h4>
                <label class="label"><sup class="req_symbol">*</sup>Firstname:</label>
                <input type="text" name="fname" id="firstname" class="input" placeholder=" Enter First Name" required>

                <label class="label"><sup class="req_symbol">*</sup>Lastname:</label>
                <input type="text" name="lname" id="" class="input" placeholder="Enter Last Name" required>

                <label class="label"><sup class="req_symbol">*</sup>Choose Course:</label>
                <select name="idname" id="myselect" class="input" onchange="idproof()">
                    <option value="BSHM">BSHM</option>
                    <option value="BSCS">BSCS</option>
                    <option value="BSBA">BSBA</option>
                    <option value="BEED">BEED</option>
                    <option value="BSOA">BSOA</option>
                </select>
                <label class="label" id="myid1"><sup class="req_symbol">*</sup>Year Level:</label>
                <input type="text" name="idnum" placeholder="Enter Year Level" class="input" required>

                <label class="label" id="myid"><sup class="req_symbol">*</sup>PHOTO:</label>
                <input type="file" accept="image/*" name="idcard" id="myfile" class="input" required>

                <label class="label" id="myid1"><sup class="req_symbol">*</sup>Student Number:</label>
                <input type="text" name="instidnum" placeholder="Enter Student Number" class="input" required>

                <label class="label"><sup class="req_symbol">*</sup>Date of Birth:</label>
                <input type="date" name="dob" class="input" required>

                <label class="label"><sup class="req_symbol">*</sup>Gender:</label>
                <input type="radio" value="male" name="gender" id="" class="radio" required>Male
                <input type="radio" value="female" name="gender" id="" class="radio">Female
                <input type="radio" value="other" name="gender" id="" class="radio">Other

                <label class="label"><sup class="req_symbol">*</sup>Phone Number:</label>
                <input type="text" name="phone" id="" class="input" placeholder="Enter Phone Number" required>

                <label class="label"><sup class="req_symbol">*</sup>Address:</label>
                <input type="text" name="address" id="" class="input" placeholder="Enter Address" required>

                
                <button class="button" name="register">Register</button>
                <div class="link1">Already have account ? <a href="index.php">Login here</a></div>
            </div>
        </form>
   </div> 
   <p class="msg"></p>
   <script>
       function idproof()
       {
            var x=document.getElementById("myselect").value;
            document.getElementById("myid").innerHTML=x+" Photo:";
            document.getElementById("myid1").innerHTML=x+" Year Level:";
       }
   </script>
</body>
</html>