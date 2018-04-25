<?php
    $uid = test_input($_POST["id"]);
    $uname = test_input($_POST["name"]);
    $uphone = test_input($_POST["phone"]);
    $udept = test_input($_POST["dept"]);
    $urole = test_input($_POST["role"]);                  
    $con = mysqli_connect("localhost","root","","lineup");
    if(!$con)
    {
        echo "Server not connected";
    }
    else
    {
        $query_check = "update faculty set fname = '$uname', phone = '$uphone', role = '$urole', department = '$udept' where fid = '$uid'";
        $e = mysqli_query($con,$query_check);
        if($e)
        {
            echo "updated successfully";
        }
        else
        {
            die(mysqli_error($con));
        }
    }
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>