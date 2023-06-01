<?php
session_start();
define('TITLE', 'Technician');
define('PAGE', 'technician');
include('includes/header.php');
include('../dbConnection.php');
if (isset($_SESSION['is_adminlogin'])) {
  $aEmail = $_SESSION['aEmail'];
} else {
  echo "<script> location.href='login.php'; </script>";
}
?>
<div class="col-sm-9 col-md-10 mt-5 text-center">
  <p class="bg-dark text-white p-2">List of Technician</p>
  <?php
  $sql = "SELECT * FROM technician_tb";
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
    echo '<table class="table">
  <thead>
   <tr>
    <th scope="col">Tech ID</th>
    <th scope="col">Name</th>
    <th scope="col">City</th>
    <th scope="col">Mobile</th>
    <th scope="col">Email</th>
    <th scope="col">Action</th>
   </tr>
  </thead>
  <tbody>';
    while ($row = $result->fetch_assoc()) {
      echo '<tr>';
      echo '<th scope="row">' . $row["empid"] . '</th>';
      echo '<td>' . $row["empName"] . '</td>';
      echo '<td>' . $row["empCity"] . '</td>';
      echo '<td>' . $row["empMobile"] . '</td>';
      echo '<td>' . $row["empEmail"] . '</td>';
      echo '<td><form action="edittech.php" method="POST" class="d-inline"> <input type="hidden" name="id" value=' . $row["empid"] . '><button type="submit" class="btn btn-info mr-3" name="edit" value="Edit"><i class="fas fa-pen"></i></button></form>  
     <form action="" method="POST" class="d-inline"><input type="hidden" name="id" value=' . $row["empid"] . '><button type="submit" class="btn btn-secondary" name="delete" value="Delete"><i class="far fa-trash-alt"></i></button></form></td>
    </tr>';
    }

    echo '</tbody>
  </table>';
  } else {
    echo "0 Result";
  }
  ?>
</div>
<?php
if (isset($_REQUEST['delete'])) {
  $sql = "DELETE FROM technician_tb WHERE empid = {$_REQUEST['id']}";
  if ($conn->query($sql) === TRUE) {
    // below code will refresh the page after deleting the record
    echo '<meta http-equiv="refresh" content= "0;URL=?deleted" />';
  } else {
    echo "Unable to Delete Data";
  }
}
?>
</div> <!-- End Row -->
<div class="float-right">
  <a href="inserttech.php" class="btn btn-danger"><i class="fas fa-plus fa-2x"></i></a>
</div>
</div> <!-- End Container -->


<!-- Boostrap JavaScript -->
<script src="../js/jquery.min.js"></script>
<script src="../js/popper.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
<script src="../js/all.min.js"></script>
</body>

</html>