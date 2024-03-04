<!-- Called the dbconnection.php file  -->
<?php
   include 'dbconnection.php';
   // data get from url and sending from index.php
   $id = $_GET['id'];
   $name = $_GET['firstname'];
?>
<!-- Action option of submit button -->
<?php
   if(isset($_POST['submit'])){
      $first_name = $_POST['f_name'];
      $last_name = $_POST['l_name'];
      $email = $_POST['email'];
      $gender = $_POST['gender'];		
           
        if ($first_name == ""){
           header("Location: edit.php?msg='First Name' Field is Required");
        }else if($last_name == ""){
            header("Location: edit.php?msg='Last Name' Field is Required");
        }else if($email == ""){
            header("Location: edit.php?msg='Email' Field is Required");
        }else if($gender == false){
            header("Location: edit.php?msg='Gender' Field is Required");
        }else{
                 $sql = "UPDATE `myguests` 
                        SET `firstname`='$first_name',`lastname`='$last_name',`email`='$email',`gender`='$gender' 
                        WHERE `id` = '$id' ";  
                 $result = $conn->query($sql);
              
                 if ($result === TRUE) {
                    header("Location: index.php?msg=Record updated successfully");
                 } else {
                    echo "Failed: " . $conn->error;
                 }
         }
   }
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
         <h3>Welcome <strong><?php echo $name;  ?></strong></h3>
         <p class="text-muted">Update your profile</p>
      </div>

      <!-- Called the required file error msg -->
      <?php
         if (isset($_GET["msg"])) {
         $msg = $_GET["msg"];
         echo '<div class="container col-6 justify-content-center text-center alert alert-danger  ">'.$msg.'</div>';
         }	
      ?>

      <!-- called the specific id's all information -->
      <?php 
         $id = $_GET['id'];
         $sql = "SELECT * 
                 FROM `myguests` 
                 WHERE id=$id 
                 limit 1";
         $result = $conn->query($sql);

         $row = $result->fetch_assoc();           //var_dump($row);
      ?>
      <div class="container d-flex justify-content-center">
         <form action="" method="post" style="width:50vw; min-width:300px;">
            <div class="row mb-3">
               <div class="col">
                  <label class="form-label">First Name:*</label>
                  <input type="text" class="form-control" name="f_name" value="<?php echo $row['firstname']  ?>" required>
               </div>

               <div class="col">
                  <label class="form-label">Last Name:*</label>
                  <input type="text" class="form-control" name="l_name" value="<?php echo $row['lastname'] ?>" required>
               </div>
            </div>

            <div class="mb-3">
               <label class="form-label">Email:*</label>
               <input type="email" class="form-control" name="email" value="<?php echo $row['email'] ?>" required>
            </div>

            <div class="form-group mb-3">
               <label>Gender:*</label>
               &nbsp;
               <input type="radio" class="form-check-input" name="gender" id="male" value="Male" <?php echo ($row['gender']=='Male')?'checked':'' ?>>
               <label for="male" class="form-input-label">Male</label>
               &nbsp;
               <input type="radio" class="form-check-input" name="gender" id="female" value="Female" <?php echo ($row['gender']=='Female')?'checked':'' ?>>
               <label for="female" class="form-input-label">Female</label>
            </div>

            <div>
               <button type="submit" class="btn btn-success" name="submit">Update</button>
               <a href="index.php" class="btn btn-primary">All Guest</a>
            </div>
         </form>
      </div>
   </div>

<!-- Called the js.php file -->
<?php
  include 'js.php';
?>

</body>
</html>