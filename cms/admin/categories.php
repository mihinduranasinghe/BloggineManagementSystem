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
                        
                        
                        
                        <?php insert_category(); ?> 
                            
                            
                            
                            
                        <form action="" method="post">
                            
                            <div class="form_group">
                               <label for="cat-title">Add Category</label>
                                <input type="text" class="form-control" name="cat_title">
                            </div>
                             <div class="form_group">
                                <input class="btn btn-primary" type="submit" name="submit" value="add category">
                            </div>
                        </form>
                            
                     <?php //update and include
                            if(isset($_GET['edit'])){
                                $cat_id=$_GET['edit'];
                                include "includes/update_categories.php";
                            }
                        ?>
                        
                        </div>
                        
                        <div class="col-xs-6">
                        
                                <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Category ID</th>
                                    </tr>
                                </thead>
                                <tbody>
                                
                                  <?php display_all_categories();//display all category ?>
                                  <?php delete_category();//delete category ?>   
                                   
                                   
                                    
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