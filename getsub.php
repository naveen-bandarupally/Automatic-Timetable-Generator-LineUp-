<?php
    $sid = test_input($_POST["id"]);                  
    $con = mysqli_connect("localhost","root","","lineup");
    if(!$con)
    {
        echo "Server not connected";
    }
    else
    {
        $query_check = "select * from subject where sid = '$sid'";
        $e = mysqli_query($con,$query_check);
        if(mysqli_num_rows($e) > 0)
        {
            $exist = mysqli_fetch_assoc($e);
            $name = $exist["sname"];
            $type = $exist["stype"];
            $year = $exist["year"];
            $sem = $exist["sem"];
            $lhpw = $exist["lhpw"];
            $result = array('sname'=>$name,'type'=>$type,'year'=>$year,'sem'=>$sem,'lhpw'=>$lhpw);
            echo json_encode($result);
        }
        else
        {
            $res = array('issub'=>'no');
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