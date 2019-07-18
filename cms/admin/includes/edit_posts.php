<?php


    if(isset($_GET['p_id'])){
        $the_post_id=$_GET['p_id'];
        
    }


    $query="SELECT * FROM posts where post_id=$the_post_id";
    $select_posts_by_id = mysqli_query($connection,$query);


    while($row=mysqli_fetch_assoc($select_posts_by_id)){
        $post_id=$row["post_id"];
        $post_author=$row["post_author"];   
        $post_title=$row["post_title"];
        $post_category_id=$row["post_category_id"];
        $post_status=$row["post_status"];
        $post_image=$row["post_image"];
        $post_tags=$row["post_tags"];
        $post_content=$row["post_content"];
        $post_comment_count=$row["post_comment_count"];
        $post_date=$row["post_date"];
    }

    if(isset($_POST['update_post'])){
        
    $post_title=$_POST['title'];
    $post_author=$_POST['author'];
    $post_category_id=$_POST['post_category_id'];
    $post_status=$_POST['status'];
    
    $post_image=$_FILES['image']['name'];
    $post_image_temp=$_FILES['image']['tmp_name'];
    
    $post_tags=$_POST['tags'];
    $post_content=$_POST['content'];
    $post_date=date('d-m-y');
    $post_comment_count=4;
        
    move_uploaded_file($post_image_temp, "../images/$post_image");
      
        if(empty($post_image)){
             $query="select * from posts where post_id=$the_post_id ";
            $select_image=mysqli_query($connection,$query);
            confirmQuery($select_image);
            
            while($row=mysqli_fetch_assoc($select_image)){
                $post_image=$row['post_image'];
            }
             
        }
        
        
        
        $query="update posts set post_title='{$post_title}',post_category_id='{$post_category_id}',post_date=now(), post_author='{$post_author}', post_status='{$post_status}',post_tags='{$post_tags}',post_content='{$post_content}',post_image='{$post_image}' where post_id='{$the_post_id}' ";
        
        $update_post=mysqli_query($connection,$query);
        confirmQuery($update_post);
         echo "Post Edited: ". " ". "<a href='posts.php'>View Posts</a>";
    
    }

?>  
<form action="" method="post" enctype="multipart/form-data">
    
<div class="form-group">
    <label for="title">Post Title</label>
    <input type="text" class="form-control" name="title" value="<?php echo $post_title; ?>" >
</div>

<div class="form-group">
    <label for="post_category">Post Category Id</label>
    <input type="text" class="form-control"  name="post_category_id" value="<?php echo $post_category_id; ?>">
</div>

<div class="form-group">
    <label for="author">Post Author</label>
    <input type="text" class="form-control" name="author" value="<?php echo $post_author; ?>">
</div>
 
 <div class="form-group">
  <select name="status" id="">
     echo "<option value='<?php echo $post_status; ?>'><?php echo $post_status; ?></option>";
      
      <?php if($post_status == 'published'){
       echo "<option value='draft'>Draft</option>";
     }else{
        echo "<option value='published'>Published</option>";
    
    }
      ?>
     
  </select>
</div>
<!--
 <div class="form-group">
    <label for="post_status">Post Status</label>
    <input type="text" class="form-control" name="status" value="<?php echo $post_status; ?>" >
</div>
-->
 
 <div class="form-group">
    <label for="post_image">Post Image</label>
    <input type="file" class="form-control" name="image">
</div>
 
 <div class="form-group">
    <label for="post_tags">Post Tags</label>
    <input type="text" class="form-control" name="tags" value="<?php echo $post_tags; ?>">
</div>
 
 <div class="form-group">
    <label for="post_content">Post Content</label>
     <textarea class="form-control" name="content" id="" cols="30" rows="10">
    <?php echo $post_content; ?> </textarea>
</div>
 
  <div class="form-group">
    <input type="submit" class="btn btn-primary" name="update_post" value="Publish Post">
</div>

 
</form>