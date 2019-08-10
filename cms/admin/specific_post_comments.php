<?php include "includes/admin_header.php"; ?>

    <div id="wrapper">

        <!-- Navigation -->
<?php include "includes/admin_navigation.php"; ?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                       <h1 class="page-header">Welcome To Comments</h1>
                          
                                          
                                                                          
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
                                  
                                   <th>Delete</th>
                               </tr> 
                           </thead>
                           <tbody>
                              
                              <?php
                               $query="SELECT * FROM comments where comment_post_id=". mysqli_real_escape_string($connection, $_GET['id']) ." ";
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
                                   
                               echo "<td><a href='specific_post_comments.php?approve=$comment_id&id=".$_GET['id']."'>Approve</a></td>";
                               echo "<td><a href='specific_post_comments.php?unapprove=$comment_id&id=".$_GET['id']."'>Unapprove</a></td>";
                              
                               
                               echo "<td><a href='specific_post_comments.php?delete=$comment_id&id=".$_GET['id']."'>Delete</a></td>";
                               
                               echo "</tr>";
                               
                               }
                               
                               ?>
                              
                          
                           </tbody>
                       </table>
                       <?php 
                    
                             


                            if(isset($_GET['unapprove'])){
                                $the_comment_id=$_GET['unapprove'];
                                $query="update comments set comment_status='Unapproved' where comment_id={$the_comment_id}";
                                $comment_unapprove_query=mysqli_query($connection,$query);
                                header("Location: specific_post_comments.php?id=".$_GET['id'] ." ");
                                confirmQuery($comment_unapprove_query);
                            }

                             if(isset($_GET['approve'])){
                                $the_comment_id=$_GET['approve'];
                                $query="update comments set comment_status='Approved' where comment_id={$the_comment_id}";
                                $comment_unapprove_query=mysqli_query($connection,$query);
                                header("Location: specific_post_comments.php?id=".$_GET['id'] ." ");
                                confirmQuery($comment_unapprove_query);
                            }


                            if(isset($_GET['delete'])){
                                $the_comment_id=$_GET['delete'];
                                $query="delete from comments where comment_id={$the_comment_id}";
                                $comment_delete_query=mysqli_query($connection,$query);
                                header("Location: specific_post_comments.php?id=".$_GET['id'] ." ");
                                confirmQuery($comment_delete_query);
                            }
                        ?>
                        
                         
                    </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

   <?php include "includes/admin_footer.php"; ?>   
                      
                     
                    