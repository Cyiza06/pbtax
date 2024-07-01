<div id="customers">
  <h2>All Customers</h2>
  <table class="table ">
    <thead>
      <tr>
        <th class="text-center">S.N.</th>
        <th class="text-center">Names</th>
        <th class="text-center">Photo</th>
        <th class="text-center">Phone Number</th>
        <th class="text-center">User Address</th>
        <th class="text-center">Joining Date</th>
        <th class="text-center">Actions</th>
      </tr>
    </thead>
    <?php
      include_once "../config/connect.php";
      $sql="SELECT * from users";
      $result=$conn-> query($sql);
      $count=1;
      if ($result-> num_rows > 0){
        while ($row=$result-> fetch_assoc()) {
           
    ?>
    <tr>
      <td><?=$count?></td>
      <td><?=$row["firstName"]?> <?=$row["lastName"]?></td>
      <td><img height="40" width="40" src="<?php echo "../uploadedImages/". $row['photo']?>" alt=""></td>
      <td><?=$row["phoneNumber"]?></td>
      <td><?=$row["email"]?></td>
      <td><?=$row["date"]?></td>
      <?php
              if($row["user_type"]=='admin'){
            ?>
                <td><button class="btn btn-danger"  onclick="MakeAdmin('<?=$row['user_id']?>')">Remove Admin</button></td>
            <?php
                        
            }else if($row["user_type"]=='user'){
            ?>
                <td><button class="btn btn-success" onclick="MakeAdmin('<?=$row['user_id']?>')">Make Admin</button></td>
            <?php
                }
            ?>
        <script>
          // granting or revoking admin access
          function MakeAdmin(id){
              $.ajax({
                url:"./controller/updateAdmin.php",
                method:"post",
                data:{record:id},
                success:function(data){
                    alert('Grant or Remove Admin Access successfully');
                    $('form').trigger('reset');
                    showCustomers();
                }
            });
          }
        </script>
    </tr>
    <?php
            $count=$count+1;
           
        }
    }
    ?>
  </table>