<?php

session_start();
if($_SESSION['msgto'] != "null")
{
    $con = mysqli_connect("localhost","root","","lineup");
    $fid = $_SESSION['userid'];
    $q = "select count(msg) as c from chatting where toid = $fid and status = 0";
    $e = mysqli_query($con,$q) or die(mysqli_error($con));
    $r = mysqli_fetch_assoc($e);
    $c = $r['c'];
    if($c > 0)
        echo true;
    else
        echo false;
}

?>