    <?php include "include/db.php";?>
    <?php include "include/header.php";?>
    
    

    <!-- Navigation -->
   <?php include "include/navigation.php" ?>

    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">
                
                <?php
    
                 if(isset($_GET['p_id'])){
                     $id=$_GET['p_id'];
                     $post_author=$_GET['author'];
                 }
                    
                    
                    $query="Select * from posts where post_author='{$post_author}' ";
                    $select_all_posts_query = mysqli_query($connection,$query);
                    
                   while($row=mysqli_fetch_assoc($select_all_posts_query)){
                       $post_title=$row['post_title'];
                       $post_author=$row['post_author'];
                       $post_date=$row['post_date'];
                       $post_image=$row['post_image'];
                       $post_content=$row['post_content']; ?>
                      
                      <h1 class="page-header">
                            Page Heading
                    <small>Secondary Text</small>
                    </h1>

                     First Blog Post 
                    <h2>
                        <a href="#"><?php echo $post_title; ?></a>
                    </h2>
                    <p class="lead">
                        All posts by <?php echo $post_author; ?>
                    </p>
                    <p><span class="glyphicon glyphicon-time"></span> <?php echo $post_date; ?></p>
                    <hr>
                    <img class="img-responsive" src="images/<?php echo $post_image; ?>" alt="">
                    <hr>
                    <p><?php echo $post_content; ?></p>
                    
                    <hr>

          


            

            
                    <?php } ?>   
                      
           
            
            <!-- Blog Comments -->
                <?php
                    if(isset($_POST['create'])){
                        
                        $id=$_GET['p_id'];
                        $comment_author= $_POST['comment_author'];
                        $comment_email= $_POST['comment_email'];
                        $comment_content= $_POST['content'];
                        
                        if(!empty($comment_author) && !empty($comment_email) && !empty($comment_content) ){
                            
                            $query="insert into comments (comment_post_id, comment_author, comment_email,comment_content,comment_status,comment_date) values('$id', '{$comment_author}', '{$comment_email}', '{$comment_content}', 'Unapproved', now()) ";
        
                        $add_comment_query=mysqli_query($connection,$query);
        
                        confirmQuery($add_comment_query); 
                        
                        
                        $query="update posts set post_comment_count=post_comment_count+1 where post_id=$id";
                        $increase_comment_query=mysqli_query($connection,$query);
                        
                        
                        
                    }
                        else{
                            echo"<script>alert('Fields cannot be empty')</script>";
                            
                            
                        }
                        
                            
                        }
                        
                        
                     
                        
                         
                
               
                
                ?>

                
                    
                    
               
                
                
                
                
                

               

                   <!-- Comment -->
          

            
               </div>
                

            <!-- Blog Sidebar Widgets Column -->
              <?php include "include/sidebar.php";?> 

        </div>
        <!-- /.row -->

        <hr>

<?php
include "include/footer.php";
 ?>