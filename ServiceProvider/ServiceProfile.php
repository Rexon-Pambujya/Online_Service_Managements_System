<?php
define('TITLE', 'Profile');
define('PAGE', 'ServiceProfile');
include('includes/header.php');
include('../dbConnection.php');
session_start();
if ($_SESSION['is_login']) {
    $empEmail = $_SESSION['empEmail'];
} else {
    echo "<script> location.href='ServiceLogin.php'</script>";
}
$sql = "SELECT empName,empEmail FROM technician_tb WHERE empEmail='$empEmail'";
$result = $conn->query($sql);
if ($result->num_rows == 1) {
    $row = $result->fetch_assoc();
    $empName = $row["empName"];
}
if (isset($_REQUEST['nameupdate'])) {
    if (($_REQUEST['empName'] == "")) {
        // msg displayed if required field missing
        $passmsg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2" role="alert"> Fill All Fileds </div>';
    } else {
        $empName = $_REQUEST["empName"];
        $sql = "UPDATE technician_tb SET empName = '$empName' WHERE empEmail = '$empEmail'";
        if ($conn->query($sql) == TRUE) {
            // below msg display on form submit success
            $passmsg = '<div class="alert alert-success col-sm-6 ml-5 mt-2" role="alert"> Updated Successfully </div>';
        } else {
            // below msg display on form submit failed
            $passmsg = '<div class="alert alert-danger col-sm-6 ml-5 mt-2" role="alert"> Unable to Update </div>';
        }
    }
}
?>


<div class="col-sm-6 mt-5">
    <!-- Start 2nd Column -->
    <form action="" method="POST" class="mx-5">
        <div class="form-group">
            <label for="empEmail">Email</label>
            <input type="email" class="form-control" name="empEmail" id="empEmail" value=" <?php echo $empEmail ?>" readonly>
        </div>
        <div class="form-group">
            <label for="empName">Name</label>
            <input type="text" class="form-control" id="empName" name="empName" value=" <?php echo $empName ?>">
        </div>
        <button type="submit" class="btn btn-primary" name="nameupdate">Update</button>
        <?php if (isset($passmsg)) {
            echo $passmsg;
        } ?>
    </form>
</div> <!-- End 2nd Column -->



<?php
include('includes/footer.php');
?>