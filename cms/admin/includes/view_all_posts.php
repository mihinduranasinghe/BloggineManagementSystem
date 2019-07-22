  <?php
if(isset($_POST['checkBoxArray'])){
    
    foreach($_POST['checkBoxArray'] as $postValueId){
        
        $bulk_option=$_POST['bulk_option'];
        
        switch($bulk_option){
                
            case 'published':
                $query = "update posts set post_status = '{$bulk_option}' where post_id=$postValueId";
                $update_to_published_status=mysqli_query($connection,$query);
                break;
                
                
                case 'delete':
                $query = "delete from posts where post_id=$postValueId";
                $delete_bulk_post=mysqli_query($connection,$query);
                break;
                
                
        }
        
        
    }
}


?>
                         
                                        
                                                       
                                                                                     
                          <form action="" method="post">
                          <div id="bulkOptionContainer" class="col-xs-4">
                              
                              <select class="form-control" name="bulk_option" id="">
                                  <option value="">Select Option</option>
                                  <option value="published">Publish</option>
                                  <option value="draft">Draft</option>
                                  <option value="delete">Delete</option> 
                                  
                                  
                              </select>
                              
                          </div>
                          
                          <div class="col-xc-4">
                              <input type="submit" name="submit" class="btn btn-success" value="Apply">
                              <a href="posts.php?source=add" class="btn btn-primary">Add New</a>
                              
                          </div>
                          
                          
                          <table class="table table-bordered table-hover">
                           <thead>
                               <tr>
                                  <th><input class="selectAllBoxes" type="checkbox"></th>
                                   <th>ID</th>
                                   <th>Author</th>
                                   <th>Title</th>
                                   <th>Category</th>
                                   <th>Status</th>
                                   <th>Image</th>
                                   <th>Tags</th>
                                   <th>Comments</th>
                                   <th>Date</th>
                                   <th>View</th>
                                   <th>Edit</th>
                                   <th>Delete</th>
                               </tr>
                           </thead>
                           <tbody>
                              
                              <?php
                               $query="SELECT * FROM posts";
                               $select_posts = mysqli_query($connection,$query);


                               while($row=mysqli_fetch_assoc($select_posts)){
                                 $post_id=$row["post_id"];
                                 $post_author=$row["post_author"];   
                                 $cat_title=$row["post_title"];
                                 $cat_category_id=$row["post_category_id"];
                                 $cat_status=$row["post_status"];
                                 $cat_image=$row["post_image"];
                                 $cat_tags=$row["post_tags"];
                                 $post_comment_count=$row["post_comment_count"];
                                 $cat_date=$row["post_date"];
                                   
                               echo "<tr>";
                                ?>   
                                   
                               <td><input class='checkBoxes' type='checkbox' name='checkBoxArray[]' value='<?php echo $post_id; ?>'></td>
                               
                            <?php                 
                               echo "<td>$post_id</td>";
                               echo "<td>$post_author</td>";
                               echo "<td>$cat_title</td>";
                                   
                                        //displaying category name insteed of cat id
                                        $query="SELECT * FROM category where cat_id={$cat_category_id}";
                                                $select_category = mysqli_query($connection,$query);
                                                while($row=mysqli_fetch_assoc($select_category)){
                                                $cat_id=$row["cat_id"];
                                                $cat_title=$row["cat_title"];
                                                
                                                confirmQuery($select_category) ;  
                                   
                                                echo "<td>{$cat_title}</td>";   
                                                }
                               
                                         
                               echo "<td>$cat_status</td>";
                               echo "<td><img class='img-responsive' width='100' src='../images/$cat_image' alt='image'></td>";
                               echo "<td>$cat_tags</td>";
                               echo "<td>$post_comment_count</td>";
                               echo "<td>$cat_date</td>";
                                   
                               echo "<td><a href='../post.php?p_id={$post_id}'>View</a></td>";
                                   
                               echo "<td><a href='posts.php?source=edit&p_id={$post_id}'>Edit</a></td>";
                                   
                               echo "<td><a href='posts.php?delete={$post_id}'>Delete</a></td>";
                               
                               echo "</tr>";
                               
                               }
                               
                               ?>
                              
                          
                           </tbody>
                       </table>
                       </form>
                       
                       
                       <?php  
                            if(isset($_GET['delete'])){
                                $the_post_id=$_GET['delete'];
                                $query="delete from posts where post_id={$the_post_id}";
                                $post_delete_query=mysqli_query($connection,$query);
                                header("Location: posts.php");
                                confirmQuery($post_delete_query);
                            }
                        ?>