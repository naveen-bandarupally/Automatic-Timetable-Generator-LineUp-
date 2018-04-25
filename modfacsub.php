<?php
    $id = test_input($_POST["id"]);
    $year = test_input($_POST["year"]);
    $sec = json_decode(stripslashes($_POST["sec"]));
    $sub = test_input($_POST["sub"]);
    $con = mysqli_connect("localhost","root","","lineup");
    if(!$con)
    {
        echo "Server not connected";
    }
    else
    {
        $query_check = "select count(*) from faculty where fid = '$id'";
        $e = mysqli_query($con,$query_check);
        $exist = mysqli_fetch_array($e);
        if($exist[0])
        {
            $query = "select sid from subject where sname = '$sub'";
            $id_r = mysqli_query($con,$query);
            $sid = mysqli_fetch_array($id_r);
            $subid = $sid[0];
            foreach($sec as $sect)
            {
                $query1 = "select count(*) from teaches where fid = '$id' and sid = '$subid' and section = '$sect'";
                $r1 = mysqli_query($con,$query1);
                $yes = mysqli_fetch_array($r1);
                if(!$yes[0])
                {
                    $query_ins = "insert into teaches(fid,sid,year,section) values('$id','$subid','$year','$sect')";
                    $result = mysqli_query($con,$query_ins);
                }
            }
            echo "updated successfully";
        }
        else
            echo "Faculty doesn't exist";
    }
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>