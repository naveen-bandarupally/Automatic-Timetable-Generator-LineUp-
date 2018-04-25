<?php
    $uid = test_input($_POST["uid"]);
    $con = mysqli_connect("localhost","root","","lineup");
    if(!$con)
    {
        echo "Server not connected";
    }
    else
    {
        $query_check = "select count(*) from faculty where fid = '$uid'";
        $e = mysqli_query($con,$query_check);
        $exist = mysqli_fetch_array($e);
        if($exist[0])
        {
            $r1=0;
            $r2=0;
            $r3=0;
            $f = "f";
            $name = $f.$uid;
            $query1 = "delete from faculty where fid = '$uid'";
            $query2 = "delete from users where id = '$uid'";
            $query3 = "delete from teaches where fid = '$uid'";
            $query4 = "drop table $name";
            $r2 = mysqli_query($con,$query2);
            $r3 = mysqli_query($con,$query3);
            $r1 = mysqli_query($con,$query1);
            $r4 = mysqli_query($con,$query4);
            if($r1 && $r2)
                echo "Deleted successfully";
            else
                echo "Error occured Consult administrator";
        }
        else
            echo "Id doesnot exists";  
    }
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>                        