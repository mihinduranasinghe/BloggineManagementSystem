<?php

if(isset($_POST['create_post'])){//like this do this escape injection for all database accessess in your project launcing to the internet
    $post_title=escape($_POST['title']);
    $post_author=escape($_POST['author']);
    $post_category_id=escape($_POST['post_category']);
    $post_status=escape($_POST['status']);
    
    $post_image=escape($_FILES['image']['name']);
    $post_image_temp=$_FILES['image']['tmp_name'];
    
    $post_tags=escape($_POST['tags']);
    $post_content=escape($_POST['content']);
    $post_date=escape(date('d-m-y'));
//    $post_comment_count=4;
    
    move_uploaded_file($post_image_temp, "../images/$post_image");
    
    
       
        
        
        $query="insert into posts (post_category_id, post_title, post_author, post_date, post_image, post_content, post_tags, post_comment_count, post_status) values('{$post_category_id}', '{$post_title}', '{$post_author}', now(), '{$post_image}', '{$post_content}', '{$post_tags}', 0, '{$post_status}') ";
        
        $add_post_query=mysqli_query($connection,$query);
        
        confirmQuery($add_post_query);
    echo "Post Created: ". " ". "<a href='posts.php'>View Posts</a>";

//<!--
////        if(!$add_post_query){
////            die ('Query Fail'.mysqli_error($connection));
////           
////        }
//

     
    
}
?>
   

   
   
<form action="" method="post" enctype="multipart/form-data">
    
<div class="form-group">
    <label for="title">Post Title</label>
    <input type="text" class="form-control" name="title">
</div>



<div class="form-group">
    <label for="category">Category:</label>
    <select name="post_category" id="">
      
        <?php
        $query="SELECT * FROM category";
        $select_category=mysqli_query($connection,$query);
                    while($row=mysqli_fetch_assoc($select_category)){
                    $cat_id=$row["cat_id"];
                    $cat_title=$row["cat_title"];
                                                
                    confirmQuery($select_category) ; 
                        
                    echo "<option value='$cat_id'>{$cat_title}</option>" ;
                    }
        
        ?>
    </select>
    
</div>

 <div class="form-group">
    <label for="post_author">Post Author</label>
    <input type="text" class="form-control" name="author" >
</div>

 <div class="form-group">
    <label for="post_status">Post Status</label>
    <select name="status" id="">
        <option value="Draft">Select Options </option>
         <option value="Published">Published</option>
         <option value="Draft">Draft </option>
        
    </select>
    
</div>
 
 <div class="form-group">
    <label for="post_image">Post Image</label>
    <input type="file" class="form-control" name="image">
</div>
 
 <div class="form-group">
    <label for="post_tags">Post Tags</label>
    <input type="text" class="form-control" name="tags">
</div>
 
 <div class="form-group">
    <label for="post_content">Post Content</label>
     <textarea class="form-control" name="content" id="" cols="30" rows="10"></textarea>
</div>
 
  <div class="form-group">
    <input type="submit" class="btn btn-primary" name="create_post" value="Publish Post">
</div>

 
</form>