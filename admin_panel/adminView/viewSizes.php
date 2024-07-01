
<div id="comments" >
  <h3>Commenter Messages</h3>
  <table class="table ">
    <thead>
      <tr>
        <th class="text-center">C.N.</th>
        <th class="text-center">Commenter_name</th>
        <th class="text-center">Comment_Subject</th>
        <th class="text-center">Comment_message</th>
        <th class="text-center">Action</th>
      </tr>
    </thead>
    <?php
      include_once "../config/connect.php";
      $sql="SELECT * from comments";
      $result=$conn-> query($sql);
      $count=1;
      if ($result-> num_rows > 0){
        while ($row=$result-> fetch_assoc()) {
    ?>
    <tr>
      <td><?=$count?></td>
      <td><?=$row["v_name"]?></td>   
      <td><?=$row['v_subject']?></td>
      <td><?=$row['v_message']?></td>
      <td><a class="btn btn-primary openPopup" data-href="./adminView/viewEachComment.php?comId=<?=$row['commentid']?>" href="javascript:void(0);">View more</a></td>
      </tr>
      <?php
            $count=$count+1;
          }
        }
      ?>
  </table>  
</div>
<div class="modal fade" id="viewModal" role="dialog">
    <div class="modal-dialog modal-lg">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          
          <h4 class="modal-title">Commenter Details</h4>
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