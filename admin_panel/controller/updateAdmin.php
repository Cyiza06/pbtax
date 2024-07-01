<?php

    include_once "../config/connect.php";
   
    $order_id=$_POST['record'];
    //echo $order_id;
    $sql = "SELECT user_type from users where user_id='$order_id'"; 
    $result=$conn-> query($sql);
  //  echo $result;

    $row=$result-> fetch_assoc();
    
   // echo $row["pay_status"];
    
    if($row["user_type"]== 'user'){
         $update = mysqli_query($conn,"UPDATE users SET user_type='admin' where user_id='$order_id'");
    }
    else if($row["user_type"]=='admin'){
         $update = mysqli_query($conn,"UPDATE users SET user_type='user' where user_id='$order_id'");
    }
    
        
 
    // if($update){
    //     echo"success";
    // }
    // else{
    //     echo"error";
    // }
    
?>