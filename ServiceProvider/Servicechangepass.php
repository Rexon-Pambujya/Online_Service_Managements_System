<?php
define('TITLE', 'Change Password');
define('PAGE', 'Servicechangepass');
include('includes/header.php');
include('../dbConnection.php');
session_start();
if ($_SESSION['is_login']) {
    $empEmail = $_SESSION['empEmail'];
} else {
    echo "<script> location.href='ServiceLogin.php'</script>";
}
if (isset($_REQUEST['passupdate'])) {
    if ($_REQUEST['empPassword'] == "") {
        // msg displayed if required field missing
        $passmsg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2" role="alert"> Fill All Fileds </div>';
    } else {
        $sql = "SELECT * FROM technician_tb WHERE empEmail='$empEmail'";
        $result = $conn->query($sql);
        if ($result->num_rows == 1) {
            $empPass = $_REQUEST['empPassword'];
            $sql = "UPDATE technician_tb SET empPassword = '$empPass' WHERE empEmail = '$empEmail'";
            if ($conn->query($sql) == TRUE) {
                // below msg display on form submit success
                $passmsg = '<div class="alert alert-success col-sm-6 ml-5 mt-2" role="alert"> Updated Successfully </div>';
            } else {
                // below msg display on form submit failed
                $passmsg = '<div class="alert alert-danger col-sm-6 ml-5 mt-2" role="alert"> Unable to Update </div>';
            }
        }
    }
}
?>
<!-- Start User Chanage Password form 2nd Column -->
<div class="col-sm-9 col-md-10">
    <div class="row">
        <div class="col-sm-6">
            <form class="mt-5 mx-5" method="POST">
                <div class="form-group">
                    <label for="inputEmail">Email</label>
                    <input type="email" class="form-control" id="inputEmail" value=" <?php echo $empEmail ?>" readonly>
                </div>
                <div class="form-group">
                    <label for="inputnewpassword">New Password</label>
                    <input type="password" class="form-control" id="inputnewpassword" placeholder="New Password" name="empPassword">
                </div>
                <button type="submit" class="btn btn-primary mr-4 mt-4" name="passupdate">Update</button>
                <button type="reset" class="btn btn-secondary mt-4">Reset</button>
                <?php if (isset($passmsg)) {
                    echo $passmsg;
                } ?>
            </form>

        </div>

    </div>
</div><!-- End User Chanage Password form 2nd Column -->


<?php
include('includes/footer.php');
?>