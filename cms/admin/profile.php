<?php include "includes/admin_header.php"; ?>
    <?php
if(isset($_SESSION['username'])){
    $theusername=$_SESSION['username'];
    
    $query = "select * from users where user_name='$theusername'";
    $select_user_profile = mysqli_query($connection,$query);
    while($row=mysqli_fetch_assoc($select_user_profile)){
        
            $user_id=$row["user_id"];
            $user_name=$row["user_name"];   
            $user_firstname=$row["user_firstname"];
            $user_lastname=$row["user_lastname"];
            $user_password=$row["user_password"];
            $user_email=$row["user_email"];
            $user_image=$row["user_image"];
            $user_role=$row["user_role"];        
        
    } 
}
?>

<?php

    
if(isset($_POST['edit_users'])){
    $user_firstname=$_POST['user_firstname'];
    $user_lastname=$_POST['user_lastname'];
    $user_role=$_POST['user_role'];
    $username=$_POST['username'];
    
    $user_image=$_FILES['image']['name'];
    $user_image_temp=$_FILES['image']['tmp_name'];
    
    $user_email=$_POST['user_email'];
    $user_password=$_POST['user_password'];
    
   
    
    move_uploaded_file($user_image_temp, "../images/user_images/$user_image");
    
       if(empty($user_image)){
             $query="select * from users where user_name='$theusername' ";
            $select_image=mysqli_query($connection,$query);
            confirmQuery($select_image);
            
            while($row=mysqli_fetch_assoc($select_image)){
                $user_image=$row['user_image'];
            }
             
        }
    
    
       
        
        
        $query="update users set user_name='{$username}',user_password='{$user_password}', user_firstname='{$user_firstname}', user_lastname='{$user_lastname}', user_email= '{$user_email}', user_image='{$user_image}', user_role='{$user_role}' where user_name='$theusername' ";
        
        $edit_user_query=mysqli_query($connection,$query);
        
        confirmQuery($edit_user_query); 
        header("Location: users.php");



     
    
}
?>


    <div id="wrapper">

        <!-- Navigation -->
<?php include "includes/admin_navigation.php"; ?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                       <h1 class="page-header">Welcome To Admin</h1>
                
                                                  <form action="" method="post" enctype="multipart/form-data">

                            <div class="form-group">
                                <label for="title">First Name</label>
                                <input type="text" class="form-control" name="user_firstname" value="<?php echo $user_firstname; ?>" >
                            </div>




                             <div class="form-group">
                                <label for="post_author">Last Name</label>
                                <input type="text" class="form-control" name="user_lastname" value="<?php echo $user_lastname; ?>" >
                            </div>

                            <div class="form-group">
                                <select name="user_role" id="" >

                                    <option value="Subscriber"><?php echo $user_role; ?> </option>
                                    <?php
                                    if($user_role == 'Admin'){
                                     echo "<option value='Subscribe'>Subscribe</option>";

                                    }else{
                                     echo "<option value='Admin'>Admin</option>";

                                    }
                                    ?>
                                </select>

                            </div>

                             <div class="form-group">
                                <label for="User_image">User Image</label>
                                <input type="file" class="form-control" name="image" >
                            </div>

                             <div class="form-group">
                                <label for="User_name">User Name</label>
                                <input type="text" class="form-control" name="username"  value="<?php echo $user_name; ?>" >
                            </div>

                             <div class="form-group">
                                <label for="User_email">Email</label>
                                <input type="email" class="form-control" name="user_email" value="<?php echo $user_email; ?>" >
                            </div>

                             <div class="form-group">
                                <label for="User_password">Password</label>
                                <input type="password" class="form-control" name="user_password" value="<?php echo $user_password; ?>" >
                            </div>


                              <div class="form-group">
                                <input type="submit" class="btn btn-primary" name="edit_users" value="Edit User" >
                            </div>


                            </form> 
                        
                    </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

   <?php include "includes/admin_footer.php"; ?>