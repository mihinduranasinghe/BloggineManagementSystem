   <form action="" method="post">    
                             <div class="form_group">
                               <label for="cat-title">Edit Category</label>
                               
                               <?php
                                         if(isset($_GET['edit'])){
                                                $the_cat_id=$_GET['edit'];
                                                $query="SELECT * FROM category where cat_id={$the_cat_id}";
                                                $select_category = mysqli_query($connection,$query);


                                           while($row=mysqli_fetch_assoc($select_category)){
                                                $cat_id=$row["cat_id"];
                                                $cat_title=$row["cat_title"];
                                               ?>

                                               <input value="<?php if(isset($cat_title)){echo $cat_title;} ?>" type="text" class="form-control" name="cat_title">
                                    
                                 <?php }}
                                 
                                 ?>
                                 <?php
                                 //update Query
                                 if(isset($_POST['update_cat'])){
                                        $the_cat_title=$_POST['cat_title'];
                                        $query="update category set cat_title='{$the_cat_title}' where cat_id={$cat_id}";
                                        $category_update_query=mysqli_query($connection,$query);
                                        header("Location: categories.php");
                                        if(!$category_update_query){
                                            die("Query Fail".mysqli_error($connection));
                                        }
                                    }
                                 
                                 ?>
                                
                            </div>
                             <div class="form_group">
                                <input class="btn btn-primary" type="submit" name="update_cat" value="Update category">
                            </div>
                        </form>