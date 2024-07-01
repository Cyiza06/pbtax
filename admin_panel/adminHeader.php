<?php
   include_once "./config/connect.php";
//    session_start();

    $sql="SELECT * from users where user_type = 'admin'";
    $result=$conn-> query($sql);

    $row = mysqli_fetch_assoc($result);
?>
       
 <!-- nav -->
 <nav  class="navbar navbar-expand-lg navbar-light px-5" style="background-color: rgb(243, 243, 181);">
    <img src="../uploadedImages/" alt="">
    <a class="navbar-brand ml-5" href="./index.php">
        <img style="border-radius: 8px;" src="<?php echo "../uploadedImages/" . $row['photo'] ?>" width="80" height="80" alt="">
    </a>
    <ul class="navbar-nav mr-auto mt-2 mt-lg-0"></ul>
    
    <div class="user-cart">  
        <?php           
        if(isset($_SESSION['user_id'])){
          ?>
          <a href="" style="text-decoration:none;">
            <i class="fa fa-user mr-5" style="font-size:30px; color:#fff;" aria-hidden="true"></i>
         </a>
          <?php
        } else {
            ?>
            <a href="" style="text-decoration:none;">
                <i class="fa fa-sign-in mr-5" style="font-size:30px; color:#fff;" aria-hidden="true"></i>
            </a>

            <?php
        } ?>
    </div>  
</nav>
