<div class="container">
<table class="table table-striped">
    <thead>
        <tr>
            <th>Appointment.N.</th>
            <th>User_Photo</th>
            <th>User_Name</th>
            <th>Appoint_title</th>
            <th>User_email</th>
            <th>User_type</th>
        </tr>
    </thead>
    <?php
        include_once "../config/connect.php";
        $ID= $_GET['appID'];
        //echo $ID;
        $sql="SELECT * from users v, appointment d 
        where v.user_id=d.user_id AND
        d.app_id=$ID";
        $result=$conn-> query($sql);
        $count=1;
        if ($result-> num_rows > 0){
            while ($row=$result-> fetch_assoc()) {
                $u_id=$row['user_id'];
    ?>
                <tr>
                    <td><?=$count?></td>
                    <?php
                       $subqry="SELECT * from users v
                       where  v.user_id=$u_id";
                       $res=$conn-> query($subqry);
                       if($row2 = $res-> fetch_assoc()){
                    ?>
                    <td><img height="80px" src="<?=$row2["photo"]?>"></td>
                    <td><?=$row2["lastName"] ?></td>

                    <?php
                        }

                        $subqry2="SELECT * from appointment s, users v
                        where s.user_id=v.user_id AND v.user_id=$u_id";
                        $res2=$conn-> query($subqry2);
                        if($row3 = $res2-> fetch_assoc()){
                        ?>
                    <td><?=$row3["app_title"] ?></td>
                    <?php
                        }
                    ?>
                    <td><?=$row["email"]?></td>
                    <td><?=$row["user_type"]?></td>
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
