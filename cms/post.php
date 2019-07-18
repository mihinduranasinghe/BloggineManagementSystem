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
                 }
                    
                    
                    $query="Select * from posts where post_id=$id";
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
                        by <a href="index.php"><?php echo $post_author; ?></a>
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
                        
                         $query="insert into comments (comment_post_id, comment_author, comment_email,comment_content,comment_status,comment_date) values('$id', '{$comment_author}', '{$comment_email}', '{$comment_content}', 'Unapproved', now()) ";
        
                        $add_comment_query=mysqli_query($connection,$query);
        
                        confirmQuery($add_comment_query); 
                        
                        
                        $query="update posts set post_comment_count=post_comment_count+1 where post_id=$id";
                        $increase_comment_query=mysqli_query($connection,$query);
                        
                        
                        
                    }
                
               
                
                ?>

                <!-- Comments Form -->
                <div class="well">
                    <h4>Leave a Comment:</h4>
                    <form role="form" action="" method="post">
                       
                        <div class="form-group">
                           <label for="Author">Author</label>
                            <input class="form-control" type="text" name="comment_author">
                        </div>
                        
                        <div class="form-group">
                           <label for="email">Email</label>
                            <input class="form-control" type="email" name="comment_email">
                        </div>
                        
                        <div class="form-group">
                           <label for="comment">Your Comment</label>
                            <textarea name="content" class="form-control" rows="3"></textarea>
                        </div>
                        
                        <button type="submit" name="create" class="btn btn-primary">Submit</button>
                    </form>
                </div>

                <hr>

                <!-- Posted Comments -->
                <?php
                
                $query="select * from comments where comment_post_id={$id} and comment_status='Approved' order by comment_id desc ";
                $select_comment_query=mysqli_query($connection,$query);
                confirmQuery($select_comment_query);
                
                while($row=mysqli_fetch_assoc($select_comment_query)){
                    $comment_date=$row['comment_date'];
                    $comment_content=$row['comment_content'];
                    $comment_author=$row['comment_author']; ?>
                    
                    
                     <!-- Comment -->
                <div class="media">
                    <a class="pull-left" href="#">
                        <img class="media-object" src="http://placehold.it/64x64" alt="">
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading"><?php echo $comment_author; ?>
                            <small><?php echo $comment_date; ?></small>
                        </h4>
                        <?php echo $comment_content ; ?>
                    </div>
                </div>
                    
                    
                <?php } ?>
                
                
                
                
                

               

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