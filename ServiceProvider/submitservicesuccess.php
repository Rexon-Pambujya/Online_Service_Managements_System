<?php
define('TITLE', 'Success');
include('includes/header.php');
include('../dbConnection.php');
session_start();
if ($_SESSION['is_login']) {
    $empEmail = $_SESSION['empEmail'];
} else {
    echo "<script> location.href='ServiceLogin.php'</script>";
}
$sql = "SELECT * FROM submitservice_tb WHERE service_id = {$_SESSION['myid']}";
$result = $conn->query($sql);
if($result->num_rows == 1){
 $row = $result->fetch_assoc();
 echo "<div class='ml-5 mt-5'>
 <table class='table'>
  <tbody>
   <tr>
     <th>Service ID</th>
     <td>".$row['service_id']."</td>
   </tr>
   <tr>
     <th>Name</th>
     <td>".$row['servicer_name']."</td>
   </tr>
   <tr>
   <th>Email ID</th>
   <td>".$row['servicer_email']."</td>
  </tr>
   <tr>
    <th>Request Info</th>
    <td>".$row['service_info']."</td>
   </tr>
   <tr>
    <th>Request Description</th>
    <td>".$row['service_desc']."</td>
   </tr>

   <tr>
    <td><form class='d-print-none'><input class='btn btn-danger' type='submit' value='Print' onClick='window.print()'></form></td>
  </tr>
  </tbody>
 </table> </div>
 ";


} else {
  echo "Failed";
}
?>


<?php
include('includes/footer.php'); 
$conn->close();
?>