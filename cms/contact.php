    <?php  include "include/db.php"; ?>
 <?php  include "include/header.php"; ?>
 
 <?php
if(isset($_POST['submit'])){
        $to="contact@mihinduranasinghe.com";
        $subject=$_POST['subject'];
        $body=$_POST['body'];

}

?>


    <!-- Navigation -->
    
    <?php  include "include/navigation.php"; ?>
    
 
    <!-- Page Content -->
    <div class="container">
    
<section id="login">
    <div class="container">
        <div class="row">
            <div class="col-xs-6 col-xs-offset-3">
                <div class="form-wrap">
                <h1>Contact Us</h1>
                    <form role="form" action="registration.php" method="post" id="login-form" autocomplete="off">
                       
                       
                        <div class="form-group">
<!--                            <label for="email" class="sr-only">Your Email</label>-->
                            <input type="email" name="email" id="emauil" class="form-control" placeholder="somebody@example.com">
                        </div>
                         <div class="form-group">
<!--                            <label for="subject" class="sr-only">Subject</label>-->
                            <input type="text" name="subject" id="subject" class="form-control" placeholder="Enter The Subject">
                        </div>
                         <div class="form-group">
                            <textarea class="form-control" name="body" id="body" cols="60" rows="10"></textarea>
                        </div>
                
                        <input type="submit" name="submit" id="btn-login" class="btn btn-custom btn-lg btn-block" value="Submit">
                    </form>
                 
                </div>
            </div> <!-- /.col-xs-12 -->
        </div> <!-- /.row -->
    </div> <!-- /.container -->
</section>


        <hr>



<?php include "include/footer.php";?>
