<?php
    $subid = test_input($_POST["addsid"]);
    $sname = test_input($_POST["addsname"]);
    $type = test_input($_POST["addstype"]);
    $year = test_input($_POST["addsyear"]);
    $sem = test_input($_POST["addssem"]);
    $lhpw = test_input($_POST["addslhpw"]);
    $con = mysqli_connect("localhost","root","","lineup");
    if(!$con)
    {
        echo "Server not connected";
    }
    else
    {
        $query_check = "select count(*) from subject where sid = '$subid'";
        $e = mysqli_query($con,$query_check);
        $exist = mysqli_fetch_array($e);
        if(!$exist[0])
        {
            $query1 = "insert into subject values('$subid','$sname','$type','$year','$sem','$lhpw')";
            $r1 = mysqli_query($con,$query1);
            $q1 = "select * from section";
            $e1 = mysqli_query($con,$q1);

            // multidimensonal associative array to store section information for each year

            $yeararr = array();
            while($r2 = mysqli_fetch_assoc($e1))
            {
                $ye = $r2['year'];
                $se = $r2['sec'];
                array_push($yeararr,array("year"=>$ye,"sec"=>$se));
            }
            $s = "a";

            // array to store number of sections of second year

            $year2 = array();

            // array to store number of sections of third year

            $year3 = array();
            foreach($yeararr as $a)
            {
                $s = "a";
                for($i = 0; $i < $a['sec'];$i++)
                {
                    if($a['year']==2)
                        array_push($year2,$s);
                    else
                        array_push($year3,$s);
                    $s++;
                }
            }
            if($year == "2")
            {
                foreach($year2 as $y)
                {
                    $ye = $year.$y;
                    $q3 = "insert into counttable values('$subid','$ye',0)";
                    $exe3 = mysqli_query($con,$q3);
                }
            }
            if($year == "3")
            {
                foreach($year3 as $y)
                {
                    $ye = $year.$y;
                    $q3 = "insert into counttable values('$subid','$ye',0)";
                    $exe3 = mysqli_query($con,$q3);
                }
            }
            if($r1)
            {
                echo "Inserted successfully";
            }
            else
            {
                echo "Error occured Consult administrator";
            }
        }
        else
        {
            echo "Subject already exists";
        }
    }
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>                        