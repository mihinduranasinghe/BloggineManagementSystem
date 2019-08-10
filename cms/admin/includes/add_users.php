<?php

if(isset($_POST['create_users'])){
    $user_firstname=$_POST['user_firstname'];
    $user_lastname=$_POST['user_lastname'];
    $user_role=$_POST['user_role'];
    $username=$_POST['username'];
    
    $user_image=$_FILES['image']['name'];
    $user_image_temp=$_FILES['image']['tmp_name'];
    
    $user_email=$_POST['user_email'];
    $user_password=$_POST['user_password'];
    
   
    
    move_uploaded_file($user_image_temp, "../images/user_images/$user_image");
    
    
       
    $user_password= password_hash($user_password, PASSWORD_BCRYPT,array('cost' => 10 ));  //new hashpasssword method  
    
    
        
        $query="insert into users (user_name,user_password, user_firstname, user_lastname, user_email, user_image, user_role) values('{$username}', '{$user_password}','{$user_firstname}', '{$user_lastname}', '{$user_email}','{$user_image}','{$user_role}') ";
        
        $add_user_query=mysqli_query($connection,$query);
        
        confirmQuery($add_user_query); 
    
echo "User created: ". " ". "<a href='users.php'>View Users</a>";

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
    <input type="text" class="form-control" name="user_firstname">
</div>




 <div class="form-group">
    <label for="post_author">Last Name</label>
    <input type="text" class="form-control" name="user_lastname" >
</div>

<div class="form-group">
    <select name="user_role" id="">
       <option value="select_option">Select Option</option>
        <option value="admin">Admin</option>
        <option value="sunscriber">Subscriber</option>
    </select>
    
</div>
 
 <div class="form-group">
    <label for="User_image">User Image</label>
    <input type="file" class="form-control" name="image">
</div>
 
 <div class="form-group">
    <label for="User_name">User Name</label>
    <input type="text" class="form-control" name="username">
</div>

 <div class="form-group">
    <label for="User_email">Email</label>
    <input type="email" class="form-control" name="user_email">
</div>

 <div class="form-group">
    <label for="User_password">Password</label>
    <input type="password" class="form-control" name="user_password">
</div>
 

  <div class="form-group">
    <input type="submit" class="btn btn-primary" name="create_users" value="Add User">
</div>

 
</form>