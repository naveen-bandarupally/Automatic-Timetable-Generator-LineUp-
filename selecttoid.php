<?php

    session_start();
    $con = mysqli_connect("localhost","root","","lineup");
    $fid = $_SESSION['userid'];
    $q = "select toid from chatting where fromid = '$fid' order by stime desc limit 1";
    $e = mysqli_query($con,$q);
    $r = mysqli_fetch_assoc($e);
    $tid = $r['toid'];
    echo $tid;
?>