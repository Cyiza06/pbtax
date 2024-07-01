<div id="uploads">
  <h2>All Clients' Uploads</h2>
  <table class="table ">
    <thead>
      <tr>
        <th class="text-center">U.N.</th>
        <th class="text-center">Upload_title</th>
        <th class="text-center">Uploaded_image</th>
        <th class="text-center">Upload_description</th>
        <th class="text-center">Uploaded_date</th>
        <th class="text-center">Actions</th>
      </tr>
    </thead>
    <?php
      include_once "../config/connect.php";
      $sql="SELECT * from uploads";
      $result=$conn-> query($sql);
      $count=1;
      if ($result-> num_rows > 0){
        while ($row=$result-> fetch_assoc()) {
           
    ?>
    <tr>
      <td><?=$count?></td>
      <td><?=$row["uploaded_title"]?></td>
      <td><img height="40" width="40" src="<?php echo "../uploadedImages/Images/". $row['uploaded_image']?>" alt=""></td>
      <td><?=$row["uploaded_descri"]?></td>
      <td><?=$row["date"]?></td>
      <td>
        <button class="btn btn-danger" onclick="uploadDelete('<?=$row['upload_ID']?>')">Delete Upload</button>
        <script>
            function uploadDelete(id){
            $.ajax({
                url:"./controller/uploadDelete.php",
                method:"post",
                data:{record:id},
                success:function(data){
                    alert('Upload Successfully deleted');
                    $('form').trigger('reset');
                    showUploads();
                }
            });
}
        </script>
      </td>
    </tr>
    <?php
            $count=$count+1;
           
        }
    }
    ?>
  </table>