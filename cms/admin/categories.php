<?php include "includes/admin_header.php"; ?>

    <div id="wrapper">

        <!-- Navigation -->
<?php include "includes/admin_navigation.php"; ?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Welcome To Admin
                            <small>Author</small>
                        </h1>
                        
                        <div class="col-xs-6">
                        
                        
                        
                        <?php
                            if(isset($_POST['submit'])){
                                $cat_title=$_POST['cat_title'];
                               
                                if($cat_title=="" || empty($cat_title)){
                                    echo "This field should not be empty";
                                }else{
                                    $query="insert into category(cat_title) values('{$cat_title}')";
                                    $create_category_query=mysqli_query($connection,$query);
                                    
                                    if(!$create_category_query){
                                        die ('Query Fail'.mysqli_error($connection));
                                    }
                                    
                                }
                            }
                            ?>
                            
                            
                            
                            
                        <form action="" method="post">
                            
                            <div class="form_group">
                               <label for="cat-title">Add Category</label>
                                <input type="text" class="form-control" name="cat_title">
                            </div>
                             <div class="form_group">
                                <input class="btn btn-primary" type="submit" name="submit" value="add category">
                            </div>
                        </form></div>
                        
                        <div class="col-xs-6">
                        
                                <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Category ID</th>
                                    </tr>
                                </thead>
                                <tbody>
                                
                                  <?php
                                    //display all category
                                        $query="SELECT * FROM category";
                                        $select_category = mysqli_query($connection,$query);
                                    
                                    
                                   while($row=mysqli_fetch_assoc($select_category)){
                                        $cat_id=$row["cat_id"];
                                        $cat_title=$row["cat_title"];
                                       
                                       echo "<tr>";
                                       echo "<td>{$cat_id}</td>";
                                       echo "<td>{$cat_title}</td>";
                                       echo "<td><a href='categories.php?delete={$cat_id}'>Delete</a></td>";
                                       echo "</tr>";
                                   }

                                ?>
                                   <?php
                                    
                                    //delete data
                                    if(isset($_GET['delete'])){
                                        $the_cat_id=$_GET['delete'];
                                        
                                        $query="delete from category where cat_id={$the_cat_id}";
                                        $category_delete_query=mysqli_query($connection,$query);
                                        header("Location: categories.php");
                                        
                                    }
                                    
                                    
                                    
                                    ?>
                                    
                                    
                                </tbody>
                            </table>
                        </div>
                        
                        
                        
                    </div>
                    
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

   <?php include "includes/admin_footer.php"; ?>