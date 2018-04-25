<?php
    $subid = test_input($_POST["sid"]);
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
        if($exist[0])
        {
            $r1=0;
            $r2=0;
            $r3=0;
            $q = "select year from subject where sid = '$subid'";
            $e = mysqli_query($con,$q);
            $r = mysqli_fetch_assoc($e);
            $year = $r['year'];
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
                    $q3 = "delete from counttable where sid = '$subid' and section = '$ye'";
                    $exe3 = mysqli_query($con,$q3);
                }
            }
            else if($year == "3")
            {
                foreach($year3 as $y)
                {
                    $ye = $year.$y;
                    $q3 = "delete from counttable where sid = '$subid' and section = '$ye'";
                    $exe3 = mysqli_query($con,$q3);
                }
            }
            $query1 = "delete from subject where sid = '$subid'";
            $query2 = "delete from teaches where sid = '$subid'";
            $res1 = mysqli_query($con,$query2);
            $res = mysqli_query($con,$query1);
            if($res)
                echo "Deleted successfully";
            else
                echo "Error occured Consult administrator";
        }
        else{
            echo "subject doesn't exist";
        }
    }
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>                        