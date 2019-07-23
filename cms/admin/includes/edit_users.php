<?php
if(isset($_GET['edit_users'])){
   $the_user_id=$_GET['edit_users'] ;
    
    $query="SELECT * FROM users where user_id=$the_user_id";
       $select_users_query = mysqli_query($connection,$query);
                            
                           

       while($row=mysqli_fetch_assoc($select_users_query)){
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
             $query="select * from users where user_id=$the_user_id ";
            $select_image=mysqli_query($connection,$query);
            confirmQuery($select_image);
            
            while($row=mysqli_fetch_assoc($select_image)){
                $user_image=$row['user_image'];
            }
             
        }
    
    
       
        
    
    
    $query="select randSalt from users";
    $select_randSalt_query=mysqli_query($connection,$query);
    if(!$select_randSalt_query){
        die("QUERY FAIL: ". mysqli_error($connection));
    }
    //decripting password to display in password edit input field
    $row=mysqli_fetch_array($select_randSalt_query);
    $salt=$row['randSalt'];
    $hashed_password=crypt($user_password,$salt);
    // Here we dnt need to loop this part because randSalt is a redefined string so all the records have the same thing so we dont need to loop
    
       
        
        $query="update users set user_name='{$username}',user_password='{$hashed_password}', user_firstname='{$user_firstname}', user_lastname='{$user_lastname}', user_email= '{$user_email}', user_image='{$user_image}', user_role='{$user_role}' where user_id=$user_id ";
        
        $edit_user_query=mysqli_query($connection,$query);
        
        confirmQuery($edit_user_query);
        
        header("Location: users.php");
         echo "User Edited: ". " ". "<a href='users.php'>View Users</a>";
//<!--
////        if(!$add_post_query){
////            die ('Query Fail'.mysqli_error($connection));
////           
////        }
//

     
    
}
?>
   

   
   
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
       
        <option value="<?php echo $user_role; ?>"><?php echo $user_role; ?> </option>
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