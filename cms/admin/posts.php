<?php include "includes/admin_header.php"; ?>

    <div id="wrapper">

        <!-- Navigation -->
<?php include "includes/admin_navigation.php"; ?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                       <h1 class="page-header">Welcome To Admin</h1>
                       <table class="table table-bordered table-hover">
                           <thead>
                               <tr>
                                   <th>ID</th>
                                   <th>Author</th>
                                   <th>Title</th>
                                   <th>Category</th>
                                   <th>Status</th>
                                   <th>Image</th>
                                   <th>Tags</th>
                                   <th>Comments</th>
                                   <th>Date</th>
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
                               echo "<td>$post_id</td>";
                               echo "<td>$post_author</td>";
                               echo "<td>$cat_title</td>";
                               echo "<td>$cat_category_id</td>";
                               echo "<td>$cat_status</td>";
                               echo "<td><img class='img-responsive' width='100' src='../images/$cat_image' alt='image'></td>";
                               echo "<td>$cat_tags</td>";
                               echo "<td>$post_comment_count</td>";
                               echo "<td>$cat_date</td>";
                               echo "</tr>";
                               
                               }
                               
                               ?>
                              
                               <tr>
                                   <td>1</td>
                                   <td>Mihindu Ranasinghe</td>
                                   <td>Bootstrap</td>
                                   <td>php</td>
                                   <td>status</td>
                                   <td>image</td>
                                   <td>tags</td>
                                   <td>great</td>
                                   <td>date</td>
                               </tr>
                           </tbody>
                       </table>
                        
                    </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

   <?php include "includes/admin_footer.php"; ?>