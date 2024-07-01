<?php

    include_once "../config/dbconnect.php";
    $order_id=$_POST['record'];
    //echo $order_id;
    $sql = "SELECT appPay_status from appointment where app_id='$order_id'"; 
    $result=$conn-> query($sql);
  //  echo $result;

    $row=$result-> fetch_assoc();
    
   // echo $row["pay_status"];
    
    if($row["pay_status"]==0){
         $update = mysqli_query($conn,"UPDATE appointment SET appPay_status=1 where app_id='$order_id'");
    }
    else if($row["pay_status"]==1){
         $update = mysqli_query($conn,"UPDATE appointment SET appPpay_status=0 where app_id='$order_id'");
    }
        
 
    // if($update){
    //     echo"success";
    // }
    // else{
    //     echo"error";
    // }
    
?>