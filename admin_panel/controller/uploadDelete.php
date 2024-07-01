<?php

    include_once "../config/connect.php";
    
    $upload_id=$_POST['record'];
    $query="DELETE FROM uploads where upload_ID='$upload_id'";

    $data=mysqli_query($conn,$query);

    if($data){
        echo"Upload Deleted Successfuly";
    }
    else{
        echo"Not able to delete";
    }
    
?>