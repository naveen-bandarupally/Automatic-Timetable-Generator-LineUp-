<?php
    $nid=$_POST['nid'];
    $con = mysqli_connect("localhost","root","","lineup");
    if($con)
    {
        $q = "delete from notifications where nid = '$nid'";
        $e = mysqli_query($con,$q);
    }
    else
    {
        die("Error");
    }
?>