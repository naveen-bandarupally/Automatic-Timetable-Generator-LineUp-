<?php
    $con = mysqli_connect("localhost","root","","lineup");
    if($con)
    {
        $q = "select c.cno,f.fname,c.complaint,f.img from complaints as c,faculty as f where c.fid = f.fid and status = 0";
        $e = mysqli_query($con,$q);
        $c = mysqli_num_rows($e);
        echo "<div class='heading container'><p>complaints</p></div>
                    <br><br>";
        if($c > 0)
        {
            while($r = mysqli_fetch_assoc($e))
            {
                $cid = $r['cno'];
                $fname = $r['fname'];
                $comp = $r['complaint'];
                $img = $r['img'];
                echo "<center>
                <div class='notifi'><br>
                  <img src='images/fac/".$img."'>
                  <center><h4 class='ntfmsg'>".$fname."</h4></center><br>
                  <p class='ntfmsg' style='padding-left:20px; padding-right:20px; text-align:left;'>".$comp."</p><br>
                  <center><div class='cbt' id='".$cid."'>verify</div></center>
                  <br>
                </div></center><br>";
            }
        }
        else
            echo "<div class='heading container'><p>no complaints to display</p></div>";
    }
    else
    {
        die("Error");
    }
?>