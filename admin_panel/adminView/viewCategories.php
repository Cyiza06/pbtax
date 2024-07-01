
<div id="Notification">
  <h3>Notifactions Table</h3>
  <table class="table ">
    <thead>
      <tr>
        <th class="text-center">N.&numero;.</th>
        <th class="text-center">Notification Name</th>
        <th class="text-center">Notification Message</th>
        <th class="text-center" colspan="2">Action</th>
      </tr>
    </thead>
    <?php
      include_once "../config/connect.php";
      $sql="SELECT * from inf";
      $result=$conn-> query($sql);
      $count=1;
      if ($result-> num_rows > 0){
        while ($row=$result-> fetch_assoc()) {
    ?>
    <tr>
      <td><?=$count?></td>
      <td><?=$row["Notifications_name"]?></td>   
      <td><?=$row["message"]?></td>   
      <td><button class="btn btn-danger" style="height:40px" onclick="categoryDelete('<?=$row['category_id']?>')">Delete</button></td>
      </tr>
      <?php
            $count=$count+1;
          }
        }
      ?>
  </table>

  <!-- Trigger the modal with a button -->
  <button type="button" class="btn btn-secondary" style="height:40px" data-toggle="modal" data-target="#myModal">
    Add Notification
  </button>
   <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Create Notification</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          <form onclick="addItems()"  enctype='multipart/form-data'  method="POST">
            <div class="form-group">
              <label for="name">Notification Name:</label>
              <input type="text" class="form-control" name="NotiName" id="p_name" required>
            </div>
            <div class="form-group">
              <label for="price">Notification Message:</label>
              <input type="text" class="form-control" name="NotiMessage" id="p_price" required>
            </div>
            <div class="form-group">
              <button type="submit" class="btn btn-secondary" name="AddNotification" style="height:40px">Create Notification</button>
            </div>
          </form>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal" style="height:40px">Close</button>
        </div>
      </div>
      
    </div>
  </div>
</div>
   