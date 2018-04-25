<?php
    $id = test_input($_POST["id"]);
    $sub = test_input($_POST["sub"]);
    $year = test_input($_POST["year"]);
    $sec = test_input($_POST["sec"]);
    $con = mysqli_connect("localhost","root","","lineup");
    if(!$con)
    {
        echo "Server not connected";
    }
    else
    {
        $q = "select sid from subject where sname = '$sub'";
        $r1 = mysqli_query($con,$q);
        $sid = mysqli_fetch_array($r1);
        $query = "delete from teaches where sid = '$sid[0]' and fid = '$id' and year = '$year' and section = '$sec'";
        $r2 = mysqli_query($con,$query);
        if($r2)
            echo "Deleted successfully";
        else
            echo "Error occured Consult administrator";
    }
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>                        