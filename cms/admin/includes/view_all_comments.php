                 <table class="table table-bordered table-hover">
                           <thead>
                               <tr>
                                   <th>ID</th>
                                   <th>Author</th>
                                   <th>Comment</th>
                                   <th>Email</th>
                                   <th>Status</th>
                                   <th>In Ressponse To</th>
                                   <th>Date</th>
                                   <th>Approve</th>
                                   <th>Unapprove</th>
                                   <th>Edit</th>
                                   <th>Delete</th>
                               </tr> 
                           </thead>
                           <tbody>
                              
                              <?php
                               $query="SELECT * FROM comments";
                               $select_comments = mysqli_query($connection,$query);
                            
                           

                               while($row=mysqli_fetch_assoc($select_comments)){
                                 $comment_id=$row["comment_id"];
                                 $comment_post_id=$row["comment_post_id"];   
                                 $comment_author=$row["comment_author"];
                                 $comment_email=$row["comment_email"];
                                 $comment_content=$row["comment_content"];
                                 $comment_status=$row["comment_status"];
                                 $comment_date=$row["comment_date"];
                                 
                                
                                   
                               echo "<tr>";
                               echo "<td>$comment_id</td>";
                               echo "<td>$comment_author</td>";
                               echo "<td>$comment_email</td>";
                               echo "<td>$comment_content</td>";
                                   
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
                               echo "<td>$comment_status</td>";
                                   
                                   $query="select * from posts where post_id=$comment_post_id";
                                   $select_post_id_query=mysqli_query($connection,$query);
                                   while($row=mysqli_fetch_assoc($select_post_id_query)){
                                   
                                   $post_id=$row['post_id'];
                                   $post_title=$row['post_title'];
                               }
                                   echo "<td><a href='../post.php?p_id=$post_id'>$post_title</a></td>";  
                               
                                echo "<td>$comment_date</td>";
                                   
                               echo "<td><a href='posts.php?source=edit&p_id='>Approve</a></td>";
                               echo "<td><a href='posts.php?delete='>Unapprove</a></td>";
                              
                               echo "<td><a href='posts.php?source=edit&p_id='>Edit</a></td>";
                               echo "<td><a href='posts.php?delete='>Delete</a></td>";
                               
                               echo "</tr>";
                               
                               }
                               
                               ?>
                              
                          
                           </tbody>
                       </table>
                       <?php  
                            if(isset($_GET['delete'])){
                                $the_post_id=$_GET['delete'];
                                $query="delete from posts where post_id={$the_post_id}";
                                $post_delete_query=mysqli_query($connection,$query);
                                header("Location: posts.php");
                                confirmQuery($post_delete_query);
                            }
                        ?>