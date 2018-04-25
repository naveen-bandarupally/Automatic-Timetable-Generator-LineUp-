<?php
    $fid=$_POST['fid'];
    $con = mysqli_connect("localhost","root","","lineup");
    if($con)
    {
        $q = "select c.cno,f.fname,c.complaint,f.img,c.status from complaints as c,faculty as f where c.fid = f.fid and c.fid = '$fid'";
        $e = mysqli_query($con,$q);
        $c = mysqli_num_rows($e);
        if($c > 0)
        {
            while($r = mysqli_fetch_assoc($e))
            {
                $cid = $r['cno'];
                $fname = $r['fname'];
                $comp = $r['complaint'];
                $img = $r['img'];
                $status = $r['status'];
                if($status == 0)
                    $status = "not verified";
                else
                    $status = "verified";
                echo "<center>
                <div class='notifi'><br>
                  <img src='images/fac/".$img."'><br>
                  <center><span class='verifytxt'>".$status."</span></center><br>
                  <p class='ntfmsg' style='padding-left:20px; padding-right:20px; text-align:left;'>".$comp."</p>
                  <center><div class='delcompbt' id='".$cid."' style='display:none;'>delete</div></center>
                  <br>
                </div></center><br>";
            }
        }
        else
            echo "<div class='heading'><p>no complaints to display</p></div>";
    }
    else
    {
        die("Error");
    }
?>