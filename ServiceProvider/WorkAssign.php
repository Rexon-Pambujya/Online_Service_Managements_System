<?php
session_start();
define('TITLE', 'Work Assign');
define('PAGE', 'WorkAssign');
include('includes/header.php');
include('../dbConnection.php');
if ($_SESSION['is_login']) {
    $empPassword=$_SESSION['empPassword'];
} else {
    echo "<script> location.href='ServiceLogin.php'</script>";
}
?>
<!--Start 2nd column -->
<div class="col-sm-9 col-md-10 mt-5">
    <?php
    $sql = "SELECT * FROM assignwork_tb WHERE assign_tech='$empPassword'"; 
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        echo '<table class="table">
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
        while ($row = $result->fetch_assoc()) {
            echo '<tr>
        <th scope="row">' . $row["request_id"] . '</th>
        <td>' . $row["request_info"] . '</td>
        <td>' . $row["requester_name"] . '</td>
        <td>' . $row["requester_add2"] . '</td>
        <td>' . $row["requester_city"] . '</td>
        <td>' . $row["requester_mobile"] . '</td>
        <td>' . $row["assign_tech"] . '</td>
        <td>' . $row["assign_date"] . '</td>
        </tr>';
        }
        echo '</tbody> </table>';
    } else {
        echo "<div class='alert alert-info col-sm-6 ml-5 mt-2' role='alert'> No Work Assigned </div>";
    }
    if(isset($_REQUEST['delete'])){
        $sql = "DELETE FROM assignwork_tb WHERE request_id = {$_REQUEST['id']}";
        if($conn->query($sql) === TRUE){
          // echo "Record Deleted Successfully";
          // below code will refresh the page after deleting the record
          echo '<meta http-equiv="refresh" content= "0;URL=?deleted" />';
          } else {
            echo "Unable to Delete Data";
          }
        }
    ?>
</div>


<?php
include('includes/footer.php');
?>