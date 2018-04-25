<?php
    session_start();
    $msg = $_POST['msg'];
    $fid = $_POST['fid'];
    $tid = $_POST['tid'];
    $con = mysqli_connect("localhost","root","","lineup");
    if(!$con)
        die(mysqli_connect_error());
    else
    {
        date_default_timezone_set('Asia/Kolkata');
        $time = date("H:i:s");
        $date = date("y-m-d");
        $q = "insert into chatting(fromid,toid,stime,sdate,msg,status,isload) values('$fid','$tid','$time','$date','$msg','0','0')";
        $e = mysqli_query($con,$q);
        $q1 = "select img from faculty where fid = $fid";
        $e1 = mysqli_query($con,$q1);
        $r1 = mysqli_fetch_assoc($e1);
        $fimg = "images/fac/".$r1['img'];
        echo "<div class='chatcontainer darker'>
        <img src='".$fimg."' class='imgright'>
        <p style='text-align:right'>".$msg."</p>
        <span class='time-left'>".$time."</span>
        </div>";
    }
?>