<?php  include('db_con.php'); ?>
<?php  

if(isset($_POST['add_students'])){

    $f_name = htmlspecialchars($_POST['f_name'], ENT_QUOTES, 'UTF-8');
    $l_name = htmlspecialchars($_POST['l_name'], ENT_QUOTES, 'UTF-8');
    $age = (int)($_POST['age']);

    if(empty($f_name)){
        header('location:index.php?message=You need to fill firs name');

    }
    else{

        $query = "insert into `students` (`first_name`, `last_name`, `age`) values('$f_name','$l_name','$age') ";

        $result = mysqli_query($connection,$query);

        if(!$result){
            die("query failed".mysqli_error($connection));
        }
        else{
            header('location:index.php?insert_msg=Your data has been added successfully');
        }
    }


}

?>