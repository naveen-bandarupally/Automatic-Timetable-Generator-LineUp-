<?php
    session_start();
if(isset($_SESSION['msgto']))
{
    $fid = $_SESSION['userid'];
    $tid = $_SESSION['msgto'];
    $con = mysqli_connect("localhost","root","","lineup");
    if(!$con)
        die(mysqli_connect_error());
    else
    {
        $q = "select * from chatting where (fromid = $fid and toid = $tid) or (fromid = $tid and toid = $fid)";
        $e = mysqli_query($con,$q) or die(mysqli_error($con));
        $c = mysqli_num_rows($e);
        if($c > 0)
        {
            while($r = mysqli_fetch_assoc($e))
            {
                $from = $r['fromid'];
                $msg = $r['msg'];
                $time = $r['stime'];
                $q1 = "select img from faculty where fid = $fid";
                $e1 = mysqli_query($con,$q1);
                $r1 = mysqli_fetch_assoc($e1);
                $fimg = "images/fac/".$r1['img'];
                $q2 = "select img from faculty where fid = $tid";
                $e2 = mysqli_query($con,$q2);
                $r2 = mysqli_fetch_assoc($e2);
                $timg = "images/fac/".$r2['img'];
                if($from == $fid)
                {
                    echo "<div class='chatcontainer darker'>
                    <img src='".$fimg."' class='imgright'>
                    <p style='text-align:right'>".$msg."</p>
                    <span class='time-left'>".$time."</span>
                    </div>";
                }
                else
                {
                    echo "<div class='chatcontainer'>
                    <img  src='".$timg."'>
                    <p style='text-align:left'>".$msg."</p>
                    <span class='time-right'>".$time."</span>
                    </div>";
                }
            }
            $q1 = "update chatting set status = 1 where fromid = $tid and toid = $fid and status = 0";
            $e1 = mysqli_query($con,$q1) or die(mysqli_error($con));
        }
        else
            echo "<div style='text-align:center;'><h1>you haven't started your conversation yet</h1></div>";
    }
}
else
{
    echo "false";
}
?>