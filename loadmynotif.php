<?php
    $fid=$_POST['fid'];
    $con = mysqli_connect("localhost","root","","lineup");
    if($con)
    {
        $q = "select n.nid,n.fid,n.msg,n.status,f.fname,f.img from notifications as n,faculty as f where n.fid = f.fid and n.fid = '$fid' order by nid desc";
        $e = mysqli_query($con,$q);
        $c = mysqli_num_rows($e);
        if($c > 0)
        {
            echo "<br>";
            while($r = mysqli_fetch_assoc($e))
            {
                $nid = $r['nid'];
                $msg = $r['msg'];
                $name = $r['fname'];
                $status = $r['status'];
                $img = $r['img'];
                if($status == 0)
                    $status = "not responded";
                else if($status == 1)
                    $status = "responded";
                echo "
                <div class='notifi'><br>
                  <img src='images/fac/".$img."'>
                  <center><h4 class='ntfmsg'>".$name."</h4></center><br>
                  <p class='ntfmsg' style='padding-left:20px; padding-right:20px;'>".$msg."</p><br>
                  <center><div class='delnotfbt' id='".$nid."' style='display:none;'>delete</div></center>
                  <br>
                </div><br>";
            }
            echo "<br><br><br><br><br>";
        }
        else
            echo "<br><div class='heading'><p>you haven't posted any notification yet</p></div>";
    }
    else
    {
        die("Error");
    }
?>