<?php
    $year = test_input($_POST["year"]);
    $sem = test_input($_POST["sem"]);
    $con = mysqli_connect("localhost","root","","lineup");
    if(!$con)
    {
        echo "Server not connected";
    }
    else
    {
        $query_check = "select sname from subject where year = $year and sem = $sem";
        $result = mysqli_query($con,$query_check);
        $sub="";
        while($exist = mysqli_fetch_assoc($result))
        {
            $sub = $sub.",".$exist["sname"];
        }
        echo json_encode($sub);
    }
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>