<?php
session_start();
define('TITLE', 'TechRequest');
define('PAGE', 'techrequest');
include('includes/header.php');
include('../dbConnection.php');
if (isset($_SESSION['is_adminlogin'])) {
  $aEmail = $_SESSION['aEmail'];
} else {
  echo "<script> location.href='login.php'; </script>";
}
?>
<div class="col-md-4 mb-5">
  <!-- Main Content area start Middle -->
  <?php
  $sql = "SELECT *  FROM submitservice_tb";
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
      echo '<div class="card mt-5 mx-5">';
      echo '<div class="card-header">';
      echo 'Service ID : ' . $row['service_id'];
      echo '</div>';
      echo '<div class="card-body">';
      echo '<h5 class="card-title">Service Info : ' . $row['service_info'] . '</h5>';
      echo '<p class="card-text">' . $row['service_desc'] . '</p>';
      echo '<p class="card-text">Name: ' . $row['servicer_name'] . '</p>';
      echo '<p class="card-text">Address: ' . $row['servicer_add1'] .'&nbsp'. $row['servicer_add2'] . '</p>';
      echo '<p class="card-text">Service Date: ' . $row['service_date'] . '</p>';
      echo '<div class="float-right">';
      echo '<form action="" method="POST"><input type="hidden" name="id" value=' . $row["service_id"] . '><input type="submit" class="btn btn-secondary" name="close" value="Close"></form>';
      echo '</div>';
      echo '</div>';
      echo '</div>';
    }
  } else {
    echo '<div class="alert alert-info mt-5 col-sm-6" role="alert">
  <h4 class="alert-heading">Well done!</h4>
  <h5 class="mb-0">No Pending Requests</h5>
</div>';
  }

  // after assigning work we will delete data from submitrequesttable by pressing close button
  if (isset($_REQUEST['close'])) {
    $sql = "DELETE FROM submitservice_tb WHERE service_id = {$_REQUEST['id']}";
    if ($conn->query($sql) === TRUE) {
      // echo "Record Deleted Successfully";
      // below code will refresh the page after deleting the record
      echo '<meta http-equiv="refresh" content= "0;URL=?closed" />';
    } else {
      echo "Unable to Delete Data";
    }
  }
  ?>
</div>



<?php 
include('includes/footer.php');
 ?>