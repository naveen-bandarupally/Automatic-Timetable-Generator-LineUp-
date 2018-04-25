<?php
    $uid = test_input($_POST["id"]);                  
    $con = mysqli_connect("localhost","root","","lineup");
    if(!$con)
    {
        echo "Server not connected";
    }
    else
    {
        $query_check = "select * from faculty where fid = '$uid'";
        $e = mysqli_query($con,$query_check);
        if(mysqli_num_rows($e) > 0)
        {
            $exist = mysqli_fetch_assoc($e);
            $name = $exist["fname"];
            $phone = $exist["phone"];
            $role = $exist["role"];
            $dept = $exist["department"];
            $result = array('name'=>$name,'phone'=>$phone,'role'=>$role,'dept'=>$dept);
            echo json_encode($result);
        }
        else
        {
            $res = array('isuser'=>'no');
            echo json_encode($res);
        }
    }
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>