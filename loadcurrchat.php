<?php
session_start();
if($_SESSION['msgto'] != "none")
{
    $con = mysqli_connect("localhost","root","","lineup");
    $fid = $_SESSION['userid'];
    $tid = $_SESSION['msgto'];
    $q = "select count(msg) as c from chatting where fromid = $tid and toid = $fid and status = 0";
    $e = mysqli_query($con,$q) or die(mysqli_error($con));
    $r = mysqli_fetch_assoc($e);
    $c = $r['c'];
    if($c > 0)
    {
        $q1 = "select * from chatting where fromid = $tid and toid = $fid and status = 0 and isload = 0";
        $e1 = mysqli_query($con,$q1);
        while($r1 = mysqli_fetch_assoc($e1))
        {
            $mid = $r1['mid'];
            $from = $r1['fromid'];
            $msg = $r1['msg'];
            $time = $r1['stime'];
            $q2 = "select img from faculty where fid = $tid";
            $e2 = mysqli_query($con,$q1);
            $r2 = mysqli_fetch_assoc($e1);
            $fimg = "images/fac/".$r2['img'];
            $q3 = "select img from faculty where fid = $fid";
            $e3 = mysqli_query($con,$q3);
            $r3 = mysqli_fetch_assoc($e3);
            $timg = "images/fac/".$r3['img'];
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
            $q4 = "update chatting set isload = 1 where mid = $mid";
            $e4 = mysqli_query($con,$q4);
        }
    }
    else
       echo "yes";
}
?>