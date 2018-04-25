<?php
    $year = test_input($_POST["year"]);
    $sec = test_input($_POST["sec"]);
    $day = test_input($_POST["day"]);
    $hour = test_input($_POST["hour"]);
    $pre = test_input($_POST["pre"]);
    $pre0 = test_input($_POST["pre0"]);
    $pre1 = test_input($_POST["pre1"]);
    $con = mysqli_connect("localhost","root","","lineup");
    if(!$con)
    {
        echo "Server not connected";
    }
    else
    {
        $f = "f";
        $h = "h";
        $name = $year.$sec.$day;
        $pos = $h.$hour;
        $sect = $year.$sec;
        $q = "select a.sid,b.stype from counttable as a,subject as b where a.sid = b.sid and b.sname = '$pre' and a.section = '$sect'";
        $exe = mysqli_query($con,$q);
        $r = mysqli_fetch_assoc($exe);
        $sid = $r["sid"];
        $type = $r["stype"];
        if($type == "LAB" || $type == "TLAB")
        {
            if($year == 2)
            {
                if($pre == $pre1)
                    $pos1 = $h.($hour-1);
                else
                    $pos1 = $h.($hour+1);
                $q1 = "update timetable set $pos = '',$pos1 = '',lc = 0 where sec = '$name'";
                $exe1 = mysqli_query($con,$q1);
                $q2 = "update counttable set lhc = lhc-2 where sid = '$sid' and section = '$sect'";
                $exe2 = mysqli_query($con,$q2);
                echo "l2yes";
            }
            else
            {
                if($pre == $pre1)
                {
                    $pos1 = $h.($hour-1);
                    $pos2 = $h.($hour+2);
                    if($pre == $pre0)
                       $pos2 = $h.($hour-2);
                }
                else
                {
                    $pos1 = $h.($hour+1);
                    $pos2 = $h.($hour+2);
                }
                $q1 = "update timetable set $pos = '',$pos1 = '',$pos2 = '', lc = 0 where sec = '$name'";
                $exe1 = mysqli_query($con,$q1);
                $q2 = "update counttable set lhc = lhc-3 where sid = '$sid' and section = '$sect'";
                $exe2 = mysqli_query($con,$q2);
                echo "l3yes";
            }
        }
        else
        {
            $q1 = "update timetable set $pos = '' where sec = '$name'";
            $exe1 = mysqli_query($con,$q1);
            $q2 = "update counttable set lhc = lhc-1 where sid = '$sid' and section = '$sect'";  
            $exe2 = mysqli_query($con,$q2);
            echo "yes";
        }
    }
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>