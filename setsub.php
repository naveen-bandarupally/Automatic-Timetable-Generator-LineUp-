<?php
    $year = test_input($_POST["year"]);
    $sec = test_input($_POST["sec"]);
    $day = test_input($_POST["day"]);
    $hour = test_input($_POST["hour"]);
    $sub = test_input($_POST["sub"]);
    $pre = test_input($_POST["pre"]);
    $con = mysqli_connect("localhost","root","","lineup");
    if(!$con)
    {
        echo "Server not connected";
    }
    else
    {
        $query = "select stype from subject where sname = '$pre'";
        $exe = mysqli_query($con,$query);
        $re = mysqli_fetch_assoc($exe);
        if($re['stype'] == 'LAB')
            echo "cant";
        else
        {
            $f = "f";
            $h = "h";
            $name = $year.$sec.$day;
            $sect = $year.$sec;
            $q = "select lhc,lhpw,a.sid,b.stype from counttable as a,subject as b where a.sid = b.sid and b.sname = '$sub' and a.section = '$sect'";
            $exe = mysqli_query($con,$q);
            $r = mysqli_fetch_assoc($exe);
            $c = $r["lhc"];
            $mc = $r["lhpw"];
            $sid = $r["sid"];
            $type = $r["stype"];
            $ind = $sect.$day;
            $q3 = "select * from timetable where sec = '$ind'";
            $exe3 = mysqli_query($con,$q3);
            $re = mysqli_fetch_array($exe3);
            $rows = count($re)/2;
            $cd = 0;
            $i = 0;
            $pos = $h.$hour;
            while($i < $rows)
            {
                if($re[$i] == $sub)
                    $cd++;
                $i++;
            }
            if($c < $mc)
            {
                if($cd < 2)
                {
                    if($type == "TLAB" || $type == "LAB")
                    {
                        if($year == 2)
                        {
                            if(($hour+1) < 8)
                            {
                                $pos1 = $h.$hour;
                                $pos2 = $h.($hour+1);
                                if($type == "LAB")
                                {
                                    $q1 = "update timetable set $pos1 = '$sub',$pos2 = '$sub',lc = 1 where sec = '$name'";
                                }
                                else
                                {
                                    $q1 = "update timetable set $pos1 = '$sub',$pos2 = '$sub' where sec = '$name'";
                                }
                                $exe1 = mysqli_query($con,$q1);
                                $c = $c+2;
                                $q2 = "update counttable set lhc = '$mc' where sid = '$sid' and section = '$sect'";
                                $exe2 = mysqli_query($con,$q2);
                                echo "l2yes";
                            }
                            else
                                echo "nsp";
                        }
                        else
                        {
                            if(($hour+2) < 8)
                            {
                                $pos1 = $h.$hour;
                                $pos2 = $h.($hour+1);
                                $pos3 = $h.($hour+2);
                                if($type == "LAB")
                                {
                                    $q1 = "update timetable set $pos1 = '$sub',$pos2 = '$sub',$pos3 = '$sub',lc = 1 where sec = '$name'";
                                }
                                else
                                {
                                    $q1 = "update timetable set $pos1 = '$sub',$pos2 = '$sub',$pos3 = '$sub' where sec = '$name'";
                                }
                                $exe1 = mysqli_query($con,$q1);
                                $c = $c+3;
                                $q2 = "update counttable set lhc = '$c' where sid = '$sid' and section = '$sect'";
                                $exe2 = mysqli_query($con,$q2);
                                echo "l3yes";
                            }
                            else
                                echo "nsp";
                        }
                    }
                    else
                    {
                        $q1 = "update timetable set $pos = '$sub' where sec = '$name'";
                        $exe1 = mysqli_query($con,$q1);
                        $c++;
                        $q2 = "update counttable set lhc = '$c' where sid = '$sid' and section = '$sect'";
                        $exe2 = mysqli_query($con,$q2);
                        echo "yes";
                    }
                }
                else
                    echo "no";
            }
            else
                echo "nope";
        }
    }
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>