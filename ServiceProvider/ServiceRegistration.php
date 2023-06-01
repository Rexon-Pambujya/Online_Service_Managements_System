<?php
include('../dbConnection.php');
if (isset($_REQUEST['empSignup'])) {
    //Checking For Empty Fields 
    if (($_REQUEST['empName'] == "") || ($_REQUEST['empCity'] == "") || ($_REQUEST['empMobile'] == "") || ($_REQUEST['empEmail'] == "") || ($_REQUEST['empPassword'] == "")) {
        $regmsg = '<div class="alert alert-warning mt-2" role="alert">All Fields are Required</div>';
    } else {
        $sql = "Select empEmail FROM technician_tb WHERE empEmail='" . $_REQUEST['empEmail'] . "'";
        $result = $conn->query($sql);
        if ($result->num_rows == 1) {
            //Email Already Registered
            $regmsg = '<div class="alert alert-warning mt-2" role="alert">Email ID Already Registered</div>';
        } else {
            //Assigning User's Values to Variables
            $eName = $_REQUEST['empName'];
            $eCity = $_REQUEST['empCity'];
            $eMobile = $_REQUEST['empMobile'];
            $eEmail = $_REQUEST['empEmail'];
            $ePass = $_REQUEST['empPassword'];
            $sql = "INSERT INTO technician_tb ( empName , empCity, empMobile, empEmail, empPassword ) VALUES ('$eName','$eCity','$eMobile', '$eEmail' , '$ePass')";
            if ($conn->query($sql) == TRUE) {
                $regmsg = '<div class="alert alert-success mt-2" role="alert"> Account Successfully Created</div>';
            } else {
                $regmsg = '<div class="alert alert-danger mt-2" role="alert">Unable to Create Account</div>';
            }
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootsrap CSS -->
    <link rel="stylesheet" href="../css/bootstrap.min.css">

    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="../css/all.min.css">

    <style>
        .custom-margin {
            margin-top: 8vh;
        }
    </style>

    <title>Register</title>
</head>

<body>
    <div class="mb-3 mt-5 text-center" style="font-size: 30px;">
        <i class="fas fa-stethoscope"></i>
        <span>Infinity Services</span>
    </div>
    <p class="text-center" style="font-size: 20px;"><i class="fas fa-user-secret text-danger"></i> Service Provider Registration Area</p>
    <div class="container-fluid">
        <div class="row  justify-content-center custom-margin">
            <div class="col-md-6">
                <form action="" class="shadow-lg p-4" method="POST">
                    <div class="form-group">
                        <label for="empName">Name</label>
                        <input type="text" class="form-control" id="empName" name="empName">
                    </div>
                    <div class="form-group">
                        <label for="empCity">City</label>
                        <input type="text" class="form-control" id="empCity" name="empCity">
                    </div>
                    <div class="form-group">
                        <label for="empMobile">Mobile</label>
                        <input type="text" class="form-control" id="empMobile" name="empMobile" onkeypress="isInputNumber(event)">
                    </div>
                    <div class="form-group">
                        <label for="empEmail">Email</label>
                        <input type="email" class="form-control" id="empEmail" name="empEmail">
                    </div>
                    <div class="form-group">
                        <label for="empPassword">Password</label>
                        <input type="text" class="form-control" id="empPassword" name="empPassword">
                    </div>
                    <button type="submit" class="btn btn-danger mt-5 btn-block shadow-sm font-weight-bold" name="empSignup">SignUp</button>
                    <em style="font-size:10px;">Note- By clicking Sign Up,you agree to our Terms,Data Policy and Cookie Policy</em>
                    <?php if (isset($regmsg)) {
                        echo $regmsg;
                    } ?>
                </form>
                <div class="text-center"><a href="../index.php" class="btn btn-info mt-3 font-weight-bold shadow-sm">Back to Home</a></div>
            </div>
        </div>
    </div>
    <!-- Only Number for input fields -->
    <script>
        function isInputNumber(evt) {
            var ch = String.fromCharCode(evt.which);
            if (!(/[0-9]/.test(ch))) {
                evt.preventDefault();
            }
        }
    </script>
    <!-- Boostrap JavaScript -->
    <script src="../js/jquery.min.js"></script>
    <script src="../js/popper.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/all.min.js"></script>
</body>

</html>