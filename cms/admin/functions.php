<?php



function escape($string){
    //sql injection
    global $connection;
    return mysqli_real_escape_string($connection,trim ($string));
}



function users_Online(){
    
    
    if(isset($_GET['onlineUsers'])){
            //user online status
        global $connection;
            
                            if(!$connection){
                                session_start();
                                include("../include/db.php");
                                
                                $session=session_id();
                                $time = time();
                                $time_out_in_second = 60;
                                $time_out = $time - $time_out_in_second;

                                $query = "select * from users_online where session = '$session'";
                                $send_query=mysqli_query($connection,$query);
                                $count=mysqli_num_rows($send_query);

                                //if no one is loged in
                                if($count==NULL){
                                mysqli_query($connection,"insert into users_online(session,time) values('$session','$time')");
                                }
                                //if there are some loged in
                                else{
                                 mysqli_query($connection,"update users_online set time='$time' where session='$session' ");

                                }

                                $users_online_query=mysqli_query($connection,"select * from users_online where time > '$time_out' "); 
                                echo $count_user=mysqli_num_rows($users_online_query);
                            }
    
        
        
         
    }//get request
}
users_Online();





function confirmQuery($result){
    global $connection;
    if(!$result){
            die ('Query Fail'.mysqli_error($connection));
           
        }
    return $result;
}




function insert_category(){
    
    global $connection;
    
    if(isset($_POST['submit'])){
       
       $cat_title=$_POST['cat_title'];
        if($cat_title=="" || empty($cat_title)){
        echo "This field should not be empty";
        }
        else{
        
        $query="insert into category(cat_title) values('{$cat_title}')";
        $create_category_query=mysqli_query($connection,$query);

        if(!$create_category_query){
            die ('Query Fail'.mysqli_error($connection));
        }

     }
    }
    
    
}


function display_all_categories(){
    
    global $connection;
     $query="SELECT * FROM category";
     $select_category = mysqli_query($connection,$query);
                                    
                                    
    while($row=mysqli_fetch_assoc($select_category)){
         $cat_id=$row["cat_id"];
         $cat_title=$row["cat_title"];
                                       
            echo "<tr>";
            echo "<td>{$cat_id}</td>";
            echo "<td>{$cat_title}</td>";
            echo "<td><a href='categories.php?delete={$cat_id}'>Delete</a></td>";
            echo "<td><a href='categories.php?edit={$cat_id}'>Edit</a></td>";
            echo "</tr>";
     }
    
}


function delete_category(){
    global $connection;
    
    if(isset($_GET['delete'])){
        $the_cat_id=$_GET['delete'];
                                        
        $query="delete from category where cat_id={$the_cat_id}";
        $category_delete_query=mysqli_query($connection,$query);
        header("Location: categories.php");
                                        
    }
                                    
}


?>