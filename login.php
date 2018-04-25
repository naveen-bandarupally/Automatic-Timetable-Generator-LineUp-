<?php
    session_start();
    $uid = test_input($_POST["uid"]);
    $password = test_input($_POST["pwd"]);
    $con = mysqli_connect("localhost","root","","lineup");
    if($con)
    {
        $query = "select password from users where id = $uid";
        $result = mysqli_query($con,$query);
        if($result)
        {
            $result_array = mysqli_fetch_array($result);
            if($result_array[0]==$password)
            {
                $_SESSION["userid"]=$uid;
                $query1 = "select fname,role from faculty where fid = $uid";
                $e = mysqli_query($con,$query1);
                $r = mysqli_fetch_assoc($e);
                $_SESSION["username"]=$r['fname'];
                $_SESSION["login"]="yes";
                $_SESSION["role"] = $r['role'];
                echo $r['role'];
            }
            else
            {
    //                            echo "<div class='container-fluid error'>";
                echo "false";
            }
        }
        else
        {
    //                        echo "<div class='container-fluid error'>";
            echo "false";
        }
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