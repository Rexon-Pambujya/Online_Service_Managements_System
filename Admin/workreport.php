<?php
session_start();
define('TITLE', 'Work Report');
define('PAGE', 'workreport');
include('includes/header.php'); 
include('../dbConnection.php');
if(isset($_SESSION['is_adminlogin'])){
    $aEmail = $_SESSION['aEmail'];
   } else {
    echo "<script> location.href='login.php'; </script>";
}
?>
<div class="col-sm-9 col-md-10 mt-5 text-center">
  <form action="" method="POST" class="d-print-none">
    <div class="form-row">
      <div class="form-group col-md-2">
        <input type="date" class="form-control" id="startdate" name="startdate">
      </div> <span> to </span>
      <div class="form-group col-md-2">
        <input type="date" class="form-control" id="enddate" name="enddate">
      </div>
      <div class="form-group">
        <input type="submit" class="btn btn-primary" name="searchsubmit" value="Search">
      </div>
    </div>
  </form>
  <?php
 if(isset($_REQUEST['searchsubmit'])){
    $startdate = $_REQUEST['startdate'];
    $enddate = $_REQUEST['enddate'];
    // $sql = "SELECT * FROM assignwork_tb WHERE cpdate BETWEEN '2018-10-11' AND '2018-10-13'";
    $sql = "SELECT * FROM assignwork_tb WHERE assign_date BETWEEN '$startdate' AND '$enddate'";
    $result = $conn->query($sql);
    if($result->num_rows > 0){
     echo '
  <p class=" bg-dark text-white p-2 mt-4">Details</p>
  <table class="table">
    <thead>
      <tr>
        <th scope="col">Req ID</th>
        <th scope="col">Request Info</th>
        <th scope="col">Name</th>
        <th scope="col">Address</th>
        <th scope="col">City</th>
        <th scope="col">Mobile</th>
        <th scope="col">Technician</th>
        <th scope="col">Assigned Date</th>
      </tr>
    </thead>
    <tbody>';
    while($row = $result->fetch_assoc()){
        echo '<tr>
        <th scope="row">'.$row["request_id"].'</th>
        <td>'.$row["request_info"].'</td>
        <td>'.$row["requester_name"].'</td>
        <td>'.$row["requester_add2"].'</td>
        <td>'.$row["requester_city"].'</td>
        <td>'.$row["requester_mobile"].'</td>
        <td>'.$row["assign_tech"].'</td>
        <td>'.$row["assign_date"].'</td>
        </tr>';
    }
    echo '<tr>
    <td><input class="btn btn-danger d-print-none" type="submit" value="Print" onClick="window.print()"></td>
  </tr></tbody>
  </table>';
  } else {
    echo "<div class='alert alert-warning col-sm-6 ml-5 mt-2' role='alert'> No Records Found ! </div>";
  }
 }
  ?>

<?php include('includes/footer.php'); ?> 