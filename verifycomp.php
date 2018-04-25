<?php
    $id = test_input($_POST["id"]);
    $con = mysqli_connect("localhost","root","","lineup");
    if($con)
    {
        $q = "update complaints set status = 1 where cno = $id";
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