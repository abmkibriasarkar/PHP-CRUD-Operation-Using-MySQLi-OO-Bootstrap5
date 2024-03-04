<!-- Called the dbconnection.php file  -->
<?php 
	include "dbconnection.php";
?>

<!-- Action option of submit button -->
<?php
   if(isset($_POST['submit'])){
      $first_name = $_POST['f_name'];
      $last_name = $_POST['l_name'];
      $email = $_POST['email'];
      $gender = $_POST['gender'];		
           
        if ($first_name == ""){
           header("Location: addnewguest.php?msg='First Name' Field is Required");
        }else if($last_name == ""){
            header("Location: addnewguest.php?msg='Last Name' Field is Required");
        }else if($email == ""){
            header("Location: addnewguest.php?msg='Email' Field is Required");
        }else if($gender == false){
            header("Location: addnewguest.php?msg='Gender' Field is Required");
        }else{
                 $sql = "INSERT INTO `myguests`(`firstname`, `lastname`, `email`, `gender`) 
                         VALUES ('$first_name','$last_name','$email','$gender')";  
                 $result = $conn->query($sql);
              
                 if ($result === TRUE) {
                    header("Location: index.php?msg=New record created successfully");
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
         <h3>Add New Guest</h3>
         <p class="text-muted">Complete the form below to add a new guest</p>
      </div>

      <!-- Called the required file error msg -->
      <?php
         if (isset($_GET["msg"])) {
         $msg = $_GET["msg"];
         echo '<div class="container col-6 justify-content-center text-center alert alert-danger  ">'.$msg.'</div>';
         }	
      ?>

      <div class="container d-flex justify-content-center">
         <form action="" method="post" style="width:50vw; min-width:300px;">
            <div class="row mb-3">
               <div class="col">
                  <label class="form-label">First Name:*</label>
                  <input type="text" class="form-control" name="f_name" placeholder="Kibria" required>
               </div>

               <div class="col">
                  <label class="form-label">Last Name:*</label>
                  <input type="text" class="form-control" name="l_name" placeholder="Sarkar" required>
               </div>
            </div>

            <div class="mb-3">
               <label class="form-label">Email:*</label>
               <input type="email" class="form-control" name="email" placeholder="name@example.com" required>
            </div>

            <div class="form-group mb-3">
               <label>Gender:*</label>
               &nbsp;
               <input type="radio" class="form-check-input" name="gender" id="male" value="Male">
               <label for="male" class="form-input-label">Male</label>
               &nbsp;
               <input type="radio" class="form-check-input" name="gender" id="female" value="Female">
               <label for="female" class="form-input-label">Female</label>
            </div>

            <div>
               <button type="submit" class="btn btn-success" name="submit">Save</button>
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