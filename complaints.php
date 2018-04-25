<?php
    $comp = test_input($_POST["comp"]);
    $fid = test_input($_POST["fid"]);
    $con = mysqli_connect("localhost","root","","lineup");
    if($con)
    {
        $q = "insert into complaints(fid,complaint,status) values('$fid','$comp',0)";
        $e = mysqli_query($con,$q);
        if($e)
            echo true;
        else
            echo false;
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