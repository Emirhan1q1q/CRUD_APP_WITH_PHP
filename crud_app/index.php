
<?php include('header.php');  ?>
<?php include('db_con.php'); ?>




        <div class="box_1">
        <h2>ALL STUDENTS</h2>
        <button class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">ADD STUDENTS</button>
        </div>
        <table class="table table-hover table-bordered table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Age</th>
                    <th>Update</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                
                $query = "select * from `students` " ;

                $result = mysqli_query($connection, $query) ;
                
                if(!$result){
                    die("query Failed".mysqli_error($connection));
                }
                else{
                   
                    while($row = mysqli_fetch_assoc($result) ){
                    ?>
                        <tr>
                            <td><?php  echo $row['id']; ?></td>
                            <td><?php  echo $row['first_name']; ?></td>
                            <td><?php  echo $row['last_name']; ?></td>
                            <td><?php  echo $row['age']; ?></td>,
                            <td><a href="updete_page_1.php?id=<?php  echo $row['id']; ?> " class="btn btn-success">Update</a></td>
                            <td><a href="delete_page.php?id=<?php  echo $row['id']; ?> " class="btn btn-danger">Delete</a></td>
                         </tr>
                      

                    <?php
                    }

                }
                ?>
               
                
            </tbody>
        </table>
        

        <?php 
        
        if(isset($_GET['message'])){
            echo ("<h6 style='color: red;'>".$_GET['message']."</h6>");
        }
        
        ?>
        <?php 
        
        if(isset($_GET['insert_msg'])){
            echo ("<h6 style='color: green;'>".$_GET['insert_msg']."</h6>");
        }
        
        ?>
        <?php 
        
        if(isset($_GET['update_msg'])){
            echo ("<h6 style='color: green;'>".$_GET['update_msg']."</h6>");
        }
        
        ?>

         <?php 
        
        if(isset($_GET['delete_msg'])){
            echo ("<h6 style='color: green;'>".$_GET['delete_msg']."</h6>");
        }
        
        ?>










<form action="insert_data.php" method="post">
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">ADD STUDENTS</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
                <div class="form-group">
                    <label for="f_name">First Name </label><br>
                    <input type="text" name="f_name" class="form-control">
                </div>
                <div class="form-group">
                    <label for="l_name">Last Name</label><br>
                    <input type="text" name="l_name" class="form-control">
                </div>
                <div class="form-group">
                    <label for="age">Age</label><br>
                    <input type="text" name="age" class="form-control">
                </div>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <input type="submit" class="btn btn-success" name="add_students" value="ADD">
      </div>
    </div>
  </div>
</div>
</form>

   <?php  include('footer.php') ?>
</body>
</html>