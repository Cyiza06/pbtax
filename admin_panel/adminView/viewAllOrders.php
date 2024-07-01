<!-- done at 30/06 -->
<div id="appointmentBtn" >
  <h2>Appointments Details</h2>
  <table class="table table-striped">
    <thead>
      <tr>
        <th>A.N.</th>
        <th>Appoint_title</th>
        <th>Appoint_reason</th>
        <th>Appoint_description</th>
        <th>Appoint_Date</th>
        <th>Appoint_status</th>
        <th>payment_status</th>
        <th>More Details</th>
     </tr>
    </thead>
     <?php
      include_once "../config/connect.php";
      $sql="SELECT * from appointment";
      $result=$conn-> query($sql);
      
      if ($result-> num_rows > 0){
        while ($row=$result-> fetch_assoc()) {
    ?>
       <tr>
          <td><?=$row["app_id"]?></td>
          <td><?=$row["app_title"]?></td>
          <td><?=$row["app_reason"]?></td>
          <td><?=$row["app_descri"]?></td>
          <td><?=$row["app_date"]?></td>
           <?php 
                if($row["app_status"]==0){
                            
            ?>
                <td><button class="btn btn-danger" onclick="ChangeOrderStatus('<?=$row['app_id']?>')">Pending</button></td>
            <?php
                        
                }else{
            ?>
                <td><button class="btn btn-success" onclick="ChangeOrderStatus('<?=$row['app_id']?>')">Approved</button></td>
        
            <?php
            }
                if($row["appPay_status"]==0){
            ?>
                <td><button class="btn btn-danger"  onclick="ChangePay('<?=$row['app_id']?>')">Unpaid</button></td>
            <?php
                        
            }else if($row["pay_status"]==1){
            ?>
                <td><button class="btn btn-success" onclick="ChangePay('<?=$row['app_id']?>')">Paid </button></td>
            <?php
                }
            ?>
              
        <td><a class="btn btn-primary openPopup" data-href="./adminView/viewEachOrder.php?appID=<?=$row['app_id']?>" href="javascript:void(0);">View More</a></td>
        </tr>
    <?php
            
        }
      }
    ?>
     
  </table>
   
</div>
<!-- Modal -->
<div class="modal fade" id="viewModal" role="dialog">
    <div class="modal-dialog modal-lg">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          
          <h4 class="modal-title">Order Details</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="order-view-modal modal-body">
        
        </div>
      </div><!--/ Modal content-->
    </div><!-- /Modal dialog-->
  </div>
<script>
     //for view order modal  
    $(document).ready(function(){
      $('.openPopup').on('click',function(){
        var dataURL = $(this).attr('data-href');
    
        $('.order-view-modal').load(dataURL,function(){
          $('#viewModal').modal({show:true});
        });
      });
    });
 </script>