<?php
    $id = test_input($_POST["id"]);
    $con = mysqli_connect("localhost","root","","lineup");
    if(!$con)
    {
        echo "Server not connected";
    }
    else
    {
        $query_check = "select count(*) from faculty where fid = '$id'";
        $r = mysqli_query($con,$query_check);
        $exist = mysqli_fetch_array($r);
        if($exist[0])
        {
            $query = "select sname,t.year as 'year',section from subject as s,teaches as t where t.fid = '$id' and t.sid = s.sid ";
            $r1 = mysqli_query($con,$query);
            $sub="";
            while($exist = mysqli_fetch_assoc($r1))
            {
                $sub = $sub.",".$exist["sname"].",".$exist["year"].",".$exist["section"];
            }
            echo json_encode($sub);
        }
        else
            echo "faculty doesn't exist";
    }
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>