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
                            Welcome To Admin Area
                            
                            
                            
                            <small><?php echo $_SESSION['username'];?></small>
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="index.html">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-file"></i> Blank Page
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->
                
<!-- ......................................................................................................................  -->                
                                <!-- /.row admin widgets -->
                
<div class="row">
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-file-text fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                    
                    <?php
                        $query="select * from posts";
                        $select_all_posts = mysqli_query($connection,$query);
                        $post_count=mysqli_num_rows($select_all_posts);
                        echo "<div class='huge'>{$post_count}</div>"; 
                         echo "<div>Posts</div>"; 
                        ?>
                    </div>
                </div>
            </div>
            <a href="./posts.php">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-green">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-comments fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                    <?php
                        $query="select * from comments";
                        $select_all_comments = mysqli_query($connection,$query);
                        $comment_count=mysqli_num_rows($select_all_comments);
                        echo "<div class='huge'>{$comment_count}</div>"; 
                         echo "<div>Comments</div>"; 
                        ?>
                    </div>
                </div>
            </div>
            <a href="./comments.php">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-yellow">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-user fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                    <?php
                        $query="select * from users";
                        $select_all_users = mysqli_query($connection,$query);
                        $user_count=mysqli_num_rows($select_all_users);
                        echo "<div class='huge'>{$user_count}</div>"; 
                         echo "<div>Users</div>"; 
                        ?>
                    </div>
                </div>
            </div>
            <a href="./users.php">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-red">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-list fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                    <?php
                        $query="select * from category";
                        $select_all_categories = mysqli_query($connection,$query);
                        $category_count=mysqli_num_rows($select_all_categories);
                        echo "<div class='huge'>{$category_count}</div>"; 
                         echo "<div>Categories</div>"; 
                        ?>
                    </div>
                </div>
            </div>
            <a href="./categories.php">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
</div>
                <!-- /.row -->
<!-- ...................................................................................................................... charts starting -->
              
              <?php
                        $query="select * from posts where post_status = 'draft'";
                        $select_all_draft_posts = mysqli_query($connection,$query);
                        $draft_post_count=mysqli_num_rows($select_all_draft_posts);
                
                        $query="select * from comments where comment_status = 'unapproved'";
                        $select_all_unapproved_comments = mysqli_query($connection,$query);
                        $unapproved_comment_count=mysqli_num_rows($select_all_unapproved_comments);
                
                        $query="select * from users where user_role = 'subscriber'";
                        $select_all_subscriber_users = mysqli_query($connection,$query);
                        $subscribe_users_count=mysqli_num_rows($select_all_subscriber_users);
                
                ?>
              
              
              
               <div class="row">
                   <script type="text/javascript">
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawStuff);

      function drawStuff() {
        var data = new google.visualization.arrayToDataTable([
          ['Move', 'Percentage'],
             
            
            <?php
            $element_text = ['Active posts','Draft Posts','categories', 'Users','subscribers', 'comments','Pending Comments'];
            $element_count = [$post_count,$draft_post_count,$category_count, $user_count,$subscribe_users_count, $comment_count,$unapproved_comment_count];
            
            for($i = 0; $i < 7 ; $i++){
                echo "['{$element_text[$i]}'" . "," . "{$element_count[$i]}],";
            }
            
            
            ?>
            
         
        
          
        ]);

        var options = {
          width: 800,
          legend: { position: 'none' },
          chart: {
            title: '',
            subtitle: '' },
          axes: {
            x: {
              0: { side: 'top', label: 'White to move'} // Top x-axis.
            }
          },
          bar: { groupWidth: "90%" }
        };

        var chart = new google.charts.Bar(document.getElementById('top_x_div'));
        // Convert the Classic options to Material options.
        chart.draw(data, google.charts.Bar.convertOptions(options));
      };
    </script>
                   
                   
                   
               </div>
                 <div id="top_x_div" style="width:'auto'; height: 600px;"></div>                 
                                                                        
                
                

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

   <?php include "includes/admin_footer.php"; ?>