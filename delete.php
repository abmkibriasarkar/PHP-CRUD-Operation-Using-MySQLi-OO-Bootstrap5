<?php 
    include 'dbconnection.php';

    $id = $_GET['id'];

    $sql = "DELETE FROM `myguests`
            WHERE id = $id";
    $result = $conn->query($sql);

    if($result === TRUE){
        header("Location:index.php?msg=Record Deleted Successfully");
    }else{
        echo "".$conn->error;
    }
?>