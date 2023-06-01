<?php
define('TITLE', 'Provide Service');
define('PAGE', 'ProvideService');
include('includes/header.php');
include('../dbConnection.php');
session_start();
if ($_SESSION['is_login']) {
    $empEmail = $_SESSION['empEmail'];
} else {
    echo "<script> location.href='ServiceLogin.php'</script>";
}
if (isset($_REQUEST['submitservice'])) {
    // Checking for Empty Fields
    if (($_REQUEST['serviceinfo'] == "") || ($_REQUEST['servicedesc'] == "") || ($_REQUEST['servicername'] == "") || ($_REQUEST['serviceradd1'] == "") || ($_REQUEST['serviceradd2'] == "") || ($_REQUEST['servicercity'] == "") || ($_REQUEST['servicerstate'] == "") || ($_REQUEST['servicerzip'] == "") || ($_REQUEST['serviceremail'] == "") || ($_REQUEST['servicedate'] == "")) {
        // msg displayed if required field missing
        $msg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2" role="alert"> Fill All Fileds </div>';
    } else {
        // Assigning User Values to Variable
        $sinfo = $_REQUEST['serviceinfo'];
        $sdesc = $_REQUEST['servicedesc'];
        $sname = $_REQUEST['servicername'];
        $sadd1 = $_REQUEST['serviceradd1'];
        $sadd2 = $_REQUEST['serviceradd2'];
        $scity = $_REQUEST['servicercity'];
        $sstate = $_REQUEST['servicerstate'];
        $szip = $_REQUEST['servicerzip'];
        $semail = $_REQUEST['serviceremail'];
        $sdate = $_REQUEST['servicedate'];
        $sql = "INSERT INTO submitservice_tb(service_info, service_desc, servicer_name, servicer_add1, servicer_add2, servicer_city, servicer_state, servicer_zip, servicer_email, service_date) VALUES ('$sinfo','$sdesc', '$sname', '$sadd1', '$sadd2', '$scity', '$sstate', '$szip', '$semail', '$sdate')";
        if ($conn->query($sql) == TRUE) {
            // below msg display on form submit success
            $genid = mysqli_insert_id($conn);
            $msg = '<div class="alert alert-success col-sm-6 ml-5 mt-2" role="alert"> Request Submitted Successfully</div>';
            session_start();
            $_SESSION['myid'] = $genid;
            echo "<script> location.href='submitservicesuccess.php'; </script>";
            // include('submitservicesuccess.php');
        } else {
            // below msg display on form submit failed
            $msg = '<div class="alert alert-danger col-sm-6 ml-5 mt-2" role="alert"> Unable to Submit Your Request </div>';
        }
    }
}
?>
<div class="col-sm-9 col-md-10 mt-5">
    <form class="mx-5" action="" method="POST">
        <div class="form-group">
            <label for="inputServiceInfo">Service Info</label>
            <input type="text" class="form-control" id="inputServiceInfo" placeholder="Service Info" name="serviceinfo">
        </div>
        <div class="form-group">
            <label for="inputServiceDescription">Description</label>
            <input type="text" class="form-control" id="inputServiceDescription" placeholder="Write Description" name="servicedesc">
        </div>
        <div class="form-group">
            <label for="inputName">Name</label>
            <input type="text" class="form-control" id="inputName" placeholder="Rahul" name="servicername">
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="inputAddress">Address Line 1</label>
                <input type="text" class="form-control" id="inputAddress" placeholder="House No. 123" name="serviceradd1">
            </div>
            <div class="form-group col-md-6">
                <label for="inputAddress2">Address Line 2</label>
                <input type="text" class="form-control" id="inputAddress2" placeholder="Railway Colony" name="serviceradd2">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="inputCity">City</label>
                <input type="text" class="form-control" id="inputCity" name="servicercity">
            </div>
            <div class="form-group col-md-4">
                <label for="inputState">State</label>
                <input type="text" class="form-control" id="inputState" name="servicerstate">
            </div>
            <div class="form-group col-md-2">
                <label for="inputZip">Zip</label>
                <input type="text" class="form-control" id="inputZip" name="servicerzip" onkeypress="isInputNumber(event)">
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="inputEmail">Email</label>
                <input type="email" class="form-control" id="inputEmail" name="serviceremail">
            </div>
            <div class="form-group col-md-2">
                <label for="inputDate">Date</label>
                <input type="date" class="form-control" id="inputDate" name="servicedate">
            </div>
        </div>

        <button type="submit" class="btn btn-primary" name="submitservice">Submit</button>
        <button type="reset" class="btn btn-secondary">Reset</button>
    </form>
    <!-- below msg display if required fill missing or form submitted success or failed -->
    <?php if (isset($msg)) {
        echo $msg;
    } ?>
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


<?php
include('includes/footer.php');
?>