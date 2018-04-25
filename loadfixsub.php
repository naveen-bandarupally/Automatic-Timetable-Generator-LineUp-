<?php
    $loc = test_input($_POST["loc"]);
    $year = test_input($_POST["year"]);
    $con = mysqli_connect("localhost","root","","lineup");
    if(!$con)
    {
        echo "Server not connected";
    }
    else
    {
        $query_check = "select sname,sid from subject where year = $year and (sid not in (select sid from teaches where year = $year))";
        $result = mysqli_query($con,$query_check);
        echo "<center><p class='subj' id='$loc' style='font-variant: small-caps; font-weight:bold; font-size:16px;'>remove subject</p></center>";
        while($exist = mysqli_fetch_assoc($result))
        {
            echo "<center><p class='subj' id='$loc' style='font-variant: small-caps; font-weight:bold; font-size:16px;'>".$exist["sname"]."</p></center>";
        }
    }
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>