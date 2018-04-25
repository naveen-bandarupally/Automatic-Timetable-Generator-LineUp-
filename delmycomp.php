<?php
    $nid=$_POST['nid'];
    $con = mysqli_connect("localhost","root","","lineup");
    if($con)
    {
        $q = "delete from complaints where cno = '$nid'";
        $e = mysqli_query($con,$q);
    }
    else
    {
        die("Error");
    }
?>