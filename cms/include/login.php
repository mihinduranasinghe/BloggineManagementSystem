<?php include "db.php";?>
<?php session_start();?>
<?php ob_start();?>


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
        
      $password = crypt($password,$db_user_password);
        //decripting to log in
        
        
        

     
        //check whether the identicality
        if($username == $db_user_name && $password == $db_user_password ){
            
            //setting session
            $_SESSION['username']=$db_user_name;
            $_SESSION['password']=$db_user_password;
            $_SESSION['firstname']=$db_user_firstname;
            $_SESSION['lastname']=$db_user_lastname ;
            $_SESSION['user_role']=$db_user_role ;
            
            
            header("Location: ../admin/");
        }else{
            header("Location: ../index.php"); 
        }
        
        
        
    }
?>