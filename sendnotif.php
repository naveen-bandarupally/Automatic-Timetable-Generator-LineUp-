<?php
    $msg = test_input($_POST["msg"]);
    $fid = test_input($_POST["fid"]);
    $con = mysqli_connect("localhost","root","","lineup");
    if($con)
    {
        $q = "insert into notifications(fid,msg,status) values('$fid','$msg',0)";
        $e = mysqli_query($con,$q);
        if($e)
            echo "inserted successfully";
        else
            echo "failed to insert";
    }
    else
    {
        die("Error");
    }
    function test_input($data) {
      $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
      return $data;
    }
?>