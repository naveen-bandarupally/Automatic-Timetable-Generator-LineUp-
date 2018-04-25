<?php
session_start();
$con = mysqli_connect("localhost","root","","lineup");
    $fid = $_SESSION['userid'];
    $q = "select toid from chatting where fromid = '$fid' order by stime desc limit 1";
    $e = mysqli_query($con,$q);
    $r = mysqli_fetch_assoc($e);
    $tid = $r['toid'];
    $_SESSION['msgto'] = $tid;
    $q1 = "select * from chatting where (fromid = '$fid' and toid = '$tid') or (fromid = '$tid' and toid = '$fid')";
    $e1 = mysqli_query($con,$q1) or die(mysqli_error($con));
    $q2 = "select img from faculty where fid = '$fid'";
    $e2 = mysqli_query($con,$q2);
    $r2 = mysqli_fetch_assoc($e2);
    $fimg = "images/fac/".$r2['img'];
    $q2 = "select img from faculty where fid = '$tid'";
    $e2 = mysqli_query($con,$q2);
    $r2 = mysqli_fetch_assoc($e2);
    $timg = "images/fac/".$r2['img'];
    $c = mysqli_num_rows($e1);
    if($c > 0)
    {
        while($r1 = mysqli_fetch_assoc($e1))
        {
            $from = $r1['fromid'];
            $msg = $r1['msg'];
            $time = $r1['stime'];
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
    }
    else
        echo "<div style='text-align:center;'><h1>You have no chats to display....</h1><h3>click on poeple at left to start a conversation</h3></div>";
?>