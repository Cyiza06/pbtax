<!-- Sidebar -->
<div class="sidebar" id="mySidebar">
<div class="side-header">
<img style="border-radius: 8px;" src="<?php echo "../uploadedImages/" . $row['photo'] ?>" width="80" height="80" alt="">
    <h5 style="margin-top: 10px;">
    <?php echo $row['firstName'] ?>
    </h5>
</div>

<hr style="border:1px solid; background-color:white; border-color:white;">
    <span href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</span>
    <a href="" ><i class="fa fa-home"></i> Dashboard</a>
    <a href="#customers"  onclick="showCustomers()" ><i class="fa fa-users"></i> Manage Clients</a>
    <a href="#uploads"  onclick="showUploads()" ><i class="fa fa-users"></i> Manage Clients'Uploads</a>
    <script>
        // show uploads
        function showUploads(){
            $.ajax({
                url:"./adminView/viewUploads.php",
                method:"post",
                data:{record:1},
                success:function(data){
                    $('.allContent-section').html(data);
                }
            });
        }
    </script>
    <a href="#appointment" onclick="showOrders()"><i class="fa fa-list"></i> Appointments</a>
    <a href="#Notification"   onclick="showCategory()" ><i class="fa fa-th-large"></i> Notifications</a>
    <a href="#comments"   onclick="showSizes()" ><i class="fa fa-th"></i> Comments</a>
  <!---->
</div>
 
<div id="main">
    <button class="openbtn" onclick="openNav()"><i class="fa fa-home"></i></button>
</div>


