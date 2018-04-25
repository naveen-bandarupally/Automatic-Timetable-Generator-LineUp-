<?php
    $id = test_input($_POST["id"]);
    $name = test_input($_POST["name"]);
    $type = test_input($_POST["type"]);
    $year = test_input($_POST["year"]);
    $sem = test_input($_POST["sem"]); 
    $lhpw = test_input($_POST["lhpw"]);   
    $con = mysqli_connect("localhost","root","","lineup");
    if(!$con)
    {
        echo "Server not connected";
    }
    else
    {
        $query_check = "update subject set sname = '$name', stype = '$type', year = '$year', sem = '$sem', lhpw = '$lhpw' where sid = '$id'";
        $e = mysqli_query($con,$query_check);
        $q0 = "delete from counttable where sid = '$id'";
        $e0 = mysqli_query($con,$q0);
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
                    $q3 = "insert into counttable values('$id','$ye',0)";
                    $exe3 = mysqli_query($con,$q3);
                }
            }
            if($year == "3")
            {
                foreach($year3 as $y)
                {
                    $ye = $year.$y;
                    $q3 = "insert into counttable values('$id','$ye',0)";
                    $exe3 = mysqli_query($con,$q3);
                }
            }
        if($e)
        {
            echo "updated successfully";
        }
        else
        {
            die(mysqli_error($con));
        }
    }
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>