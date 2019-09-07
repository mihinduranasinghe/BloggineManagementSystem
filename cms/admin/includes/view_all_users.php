                 <table class="table table-bordered table-hover">
                           <thead>
                               <tr>
                                   <th>User ID</th>
                                   <th>User Name</th>
                                   
                                   <th>First Name</th>
                                   <th>Last Name</th>
                                   <th>image</th>
                                   <th>email</th>
                                   
                                   <th>role</th>
                               
                                  
                                 
                               </tr> 
                           </thead>
                           <tbody>
                              
                              <?php
                               $query="SELECT * FROM users";
                               $select_users = mysqli_query($connection,$query);
                            
                           

                               while($row=mysqli_fetch_assoc($select_users)){
                                 $user_id=$row["user_id"];
                                 $user_name=$row["user_name"];   
                                 $user_firstname=$row["user_firstname"];
                                 $user_lastname=$row["user_lastname"];
                                 $user_password=$row["user_password"];
                                 $user_email=$row["user_email"];
                                 $user_image=$row["user_image"];
                                 $user_role=$row["user_role"];
                                 
                                
                                   
                               echo "<tr>";
                               echo "<td>$user_id</td>";
                               echo "<td>$user_name</td>";
                               echo "<td>$user_firstname</td>";
                               echo "<td>$user_lastname</td>";
                               echo "<td><img class='img-responsive' width='100' src='../images/user_images/$user_image' alt='image'></td>";       
                               echo "<td>$user_email</td>";
                               echo "<td>$user_role</td>";        
                                     
                                   
                                        //displaying category name insteed of cat id
//                                        $query="SELECT * FROM comments where cat_id={$cat_category_id}";
//                                                $select_category = mysqli_query($connection,$query);
//                                                while($row=mysqli_fetch_assoc($select_category)){
//                                                $cat_id=$row["cat_id"];
//                                                $cat_title=$row["cat_title"];
//                                                
//                                                confirmQuery($select_category) ;  
//                                   
//                                                echo "<td>{$cat_title}</td>";   
//                                                }
//                                   
                              
                                   
//                                   $query="select * from posts where post_id=$comment_post_id";
//                                   $select_post_id_query=mysqli_query($connection,$query);
//                                   while($row=mysqli_fetch_assoc($select_post_id_query)){
//                                   
//                                   $post_id=$row['post_id'];
//                                   $post_title=$row['post_title'];
//                               }
                                    
                               
                             
                                   
                               echo "<td><a href='users.php?change_to_admin=$user_id'>Change To Admin</a></td>";
                               echo "<td><a href='users.php?change_to_subscriber=$user_id'>Change To Subscriber</a></td>";
                               echo "<td><a href='users.php?source=edit_users&edit_users=$user_id'>Edit</a></td>";
                               
                               echo "<td><a onClick=\" javascript: return confirm('Are you sure you want to delete'); \"href='users.php?delete=$user_id'>Delete</a></td>";
                               
                               echo "</tr>";
                               
                               }
                               
                               ?>
                              
                          
                           </tbody>
                       </table>
                       <?php 
                    
                             


                            if(isset($_GET['change_to_admin'])){
                                $the_user_id=$_GET['change_to_admin'];
                                $query="update users set user_role='Admin' where user_id={$the_user_id}";
                                $make_user_admin_query=mysqli_query($connection,$query);
                                header("Location: users.php");
                                confirmQuery($make_user_admin_query);
                            }

                             if(isset($_GET['change_to_subscriber'])){
                                $the_user_id=$_GET['change_to_subscriber'];
                                $query="update users set user_role='Subscriber' where user_id={$the_user_id}";
                                $make_user_subscriber_query=mysqli_query($connection,$query);
                                header("Location: users.php");
                                confirmQuery($make_user_subscriber_query);
                            }


                            if(isset($_GET['delete'])){
                                if(isset($_SESSION['user_role'])){//sql injection
                                    if($_SESSION['user_role'] == 'Admin'){
                                $the_user_id=mysqli_real_escape_string($connection,$_GET['delete']);
                                $query="delete from users where user_id={$the_user_id}";
                                $user_delete_query=mysqli_query($connection,$query);
                                header("Location: users.php");
                                confirmQuery($user_delete_query);
                                    }
                                }
                            }
                        ?>