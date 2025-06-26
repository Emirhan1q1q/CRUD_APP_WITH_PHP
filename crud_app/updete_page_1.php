<?php include('header.php');  ?>
<?php include('db_con.php'); ?>

<?php  

if(isset($_GET['id'])){
    $id = $_GET['id'];

    
                
                $query = "select * from `students` where `id` = '$id' " ;

                $result = mysqli_query($connection, $query) ;
                
                if(!$result){
                    die("query Failed".mysqli_error($connection));
                }
                else{
                   
                    $row = mysqli_fetch_assoc($result);

                  } 
}


?>
 <?php   
 
    if(isset($_POST['update_students'])){

        if(isset($_GET['id_new'])){
            $idnew = $_GET['id_new'];
        }

        $fname = filter_input(INPUT_POST,'f_name',FILTER_SANITIZE_SPECIAL_CHARS);
         $lname = filter_input(INPUT_POST,'l_name',FILTER_SANITIZE_SPECIAL_CHARS) ;
        $age = filter_input(INPUT_POST,'age', FILTER_VALIDATE_INT);

        $query = "update `students` set first_name = '$fname', `last_name` = '$lname', `age` = '$age' where `id`= '$idnew' ";

        $result = mysqli_query($connection, $query) ;
                
                if(!$result){
                    die("query Failed".mysqli_error($connection));
                }
                else{
                    header('location:index.php?update_msg=You have sucssesfully updated the data!');
                }
    }


 ?>



<form action="updete_page_1.php?id_new=<?php echo $id; ?>" method="post">
                <div class="form-group">
                    <label for="f_name">First Name </label><br>
                        <input type="text" name="f_name" class="form-control" value="<?php echo $row['first_name']  ?>">
                    </div>
                    <div class="form-group">
                        <label for="l_name">Last Name</label><br>
                        <input type="text" name="l_name" class="form-control" value="<?php echo $row['last_name']  ?>">
                    </div>
                    <div class="form-group">
                        <label for="age">Age</label><br>
                        <input type="text" name="age" class="form-control" value="<?php echo $row['age']  ?>">
                </div>
                <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        <input type="submit" class="btn btn-success" name="update_students" value="UPDATE">
      </div>
</form>



 <?php  include('footer.php') ?>