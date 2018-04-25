<?php
    $src = $_FILES['file']['tmp_name'];
    $id = $_POST["id"];
    $ext = $_POST["ext"];
    $info = pathinfo($_FILES['file']['tmp_name']);
    $newname = $id.".".$ext;
    $targ = "images/fac/".$newname;
    $con = mysqli_connect("localhost","root","","lineup");
    if($con)
    {
        $q = "update faculty set img = '$newname' where fid = $id";
        $e = mysqli_query($con,$q);
        if($e)
        {
            move_uploaded_file($src, $targ);
            echo true;
        }
        else
            echo false;
    }
?>