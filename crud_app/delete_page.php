<?php include('header.php');  ?>
<?php include('db_con.php'); ?>


<?php

    if(isset($_GET['id'])){
        $id = $_GET['id'];
    }

    $query = "delete from `students` where `id`='$id'" ;
    $result = mysqli_query($connection, $query) ;
    if(!$result){
        die("connection failed!". mysqli_error($connection));
    }
    else{
        header('location:index.php?delete_msg= You sucssesfully deleted the data ');
    }
?>


 <?php  include('footer.php') ?>