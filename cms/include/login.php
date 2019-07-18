<?php include "db.php";?>


<?php
    if(isset($_POST['login'])){
        $username=$_POST['username'];
        $password=$_POST['password'];
        
       $username = mysqli_real_escape_string($connection,$username);
       $password = mysqli_real_escape_string($connection,$password);
        //cleanup data fro hackers. A cool function by php
        
        $query = "select * from users where user_name = '{$username}' ";
        $select_user_query = mysqli_query($connection,$query);
        
        if(!$select_user_query){
            die ("Query Fail".mysqli_error($connection));
        }
        
        while($row=mysqli_fetch_assoc($select_user_query)){
            $db_id = $row['user_id'];
            $db_user_name = $row['user_name'];
            $db_user_password = $row['user_password'];
            $db_user_firstname = $row['user_firstname'];
            $db_user_lastname = $row['user_lastname'];
            $db_user_role = $row['user_role'];
            
        }
        
        if($username !== $db_user_name || $password !== $db_user_password ){
            header("Location: ../index.php");
            //echo "<h1>Username and password missmatch. Check again!</h1>";
        }else if($username == $db_user_name && $password == $db_user_password ){
            header("Location: ../admin/");
        }
            
    }
?>