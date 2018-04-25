<?php
    $name = $_POST['name'];
    $id = $_POST['id'];
    $con = mysqli_connect("localhost","root","","lineup");
    if(!$con)
        die(mysqli_connect_error());
    else
    {
        $fname = "%".$name."%";
        $q = "select * from faculty where fid != '$id' and fname like '$fname'";
        $e = mysqli_query($con,$q);
        $c = mysqli_num_rows($e);
        if($c > 0)
        {
            while($r = mysqli_fetch_assoc($e))
            {
                $img = "images/fac/".$r['img'];
                $name = $r['fname'];
                $fid = $r['fid'];
                echo "<div class='full' id='".$fid."'><div class='left'><img class='chatpics' src='".$img."'></div><div class='right'><p>".$name."</p></div></div><br>";
            }
            echo "<br><br><br>";
        }
        else
        {
            echo "<h3 style='text-align:center;'>User doesnt exist</h3>";
        }
    }
?>