<?php
    include_once "../config/connect.php";
    
    if(isset($_POST['AddNotification']))
    {
       
        $NotificationName = $_POST['p_name'];
        $Message= $_POST['p_desc'];
        

         $insert = mysqli_query($conn,"INSERT INTO inf VALUES ('','$NotificationName','$Message',1)");
 
         if(!$insert)
         {
             echo mysqli_error($conn);
         }
         else
         {
             echo "Notification added successfully.";
         }
     
    }
        
?>