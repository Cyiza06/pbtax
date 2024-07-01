<div class="container">
<table class="table table-striped">
    <thead>
        <tr>
            <th>Comment.N.</th>
            <th>Commenter_Name</th>
            <th>Commenter_Email</th>
            <th>Commenter_Phonenumber</th>
        </tr>
    </thead>
    <?php
        include_once "../config/connect.php";
        $ID= $_GET['comId'];
        //echo $ID;
        $sql="SELECT * from comments where commentid=$ID";
        $result=$conn-> query($sql);
        $count=1;
        if ($result-> num_rows > 0){
            while ($row=$result-> fetch_assoc()) {
    ?>
                <tr>
                    <td><?=$count?></td>
                    <td><?=$row["v_name"]?></td>
                    <td><?=$row["v_email"] ?></td>


                    <td><?=$row["v_phonenumber"] ?></td>
                    
                </tr>
    <?php
                $count=$count+1;
            }
        }else{
            echo "error";
        }
    ?>
</table>
</div>
