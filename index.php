<!-- Called the dbconnection.php file  -->
<?php 
	include "dbconnection.php";
?>
<!-- Called the head.php file -->
<?php
    include 'head.php';
?>

<body>
<!--   |.....................................|
       |============Content Here=============|
       |.....................................| -->

  <!-- Called the nav.php file -->   
  <?php 
    include 'nav.php';
  ?>

  <div class="container">
      <div class="text-center mb-4">
         <h3>All Guest</h3>
      </div>

    <!-- Called the New record created successfully msg -->
    <?php
    if (isset($_GET["msg"])) {
      $msg = $_GET["msg"];
      echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
      			' . $msg . '
     			 <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    		</div>';
    }	
    ?>

    <a href="addnewguest.php" class="btn btn-dark mb-3">Add New Guest</a>

    <table class="table table-hover text-center">
      <thead class="table-dark">
        <tr>
          <th scope="col">SL</th>
          <th scope="col">ID</th>
          <th scope="col">First Name</th>
          <th scope="col">Last Name</th>
          <th scope="col">Email</th>
          <th scope="col">Gender</th>
          <th scope="col">Reg. Date</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $sql = "SELECT * 
                FROM `myguests`";
        $result = $conn->query($sql);

        if ($result->num_rows>0){

          $sl=1;
          while ($row = $result->fetch_assoc()) {
          ?>
            <tr>
              <td><?php echo $sl; ?></td>
              <td><?php echo $row["id"] ?></td>
              <td><?php echo $row["firstname"] ?></td>
              <td><?php echo $row["lastname"] ?></td>
              <td><?php echo $row["email"] ?></td>
              <td><?php echo $row["gender"] ?></td>
              <td><?php echo $row["reg_date"] ?></td>
              <td>
                <a href="edit.php?id=<?php echo $row["id"]?>&firstname=<?php echo $row['firstname'] ?>" class="link-dark"><i class="fa-solid fa-pen-to-square fs-5 me-3"></i></a>
                <a href="delete.php?id=<?php echo $row["id"] ?>" class="link-dark" onclick="return checkedData()"><i class="fa-solid fa-trash fs-5"></i></a>
              </td>
            </tr>
          <?php
          $sl++;
          }
          
        }else{ ?>
            <tr>
              <td colspan="8"><?php echo "<b>There are no guest : 0 result</b>"; ?></td>
            </tr>
        <?php
        }
        ?>
      </tbody>
    </table>
  </div>
  
<!-- Called the js.php file -->
<?php
  include 'js.php';
?>
<script>
  function checkedData(){
    return confirm('Are you want to delete this record?');
  }
</script>

</body>
</html>