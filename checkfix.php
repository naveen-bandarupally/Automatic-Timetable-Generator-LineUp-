<?php
    $con = mysqli_connect("localhost","root","","lineup");
    if(!$con)
    {
        echo "Server not connected";
    }
    else
    {
        $q1 = "select * from section";
        $e1 = mysqli_query($con,$q1);
        
        // multidimensonal associative array to store section information for each year
        
        $year = array();
        while($r1 = mysqli_fetch_assoc($e1))
        {
            $ye = $r1['year'];
            $se = $r1['sec'];
            array_push($year,array("year"=>$ye,"sec"=>$se));
        }
        $s = "a";
        
        // array to store number of sections of second year
        
        $year2 = array();
        
        // array to store number of sections of third year
        
        $year3 = array();
        foreach($year as $a)
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
        $flag1 = true;
        $flag2 = true;
        $query_check = "select sname from subject where year = 2 and (sid not in (select sid from teaches where year = 2) or sid in (select sid from teaches where year = 2 and section = 'ANY'))";
        $result = mysqli_query($con,$query_check);
        $sub2 = array();
        while($exist = mysqli_fetch_assoc($result))
        {
            array_push($sub2,$exist['sname']);
        }
        $y = "2";
        foreach($year2 as $a)
        {
            $yea = $y.$a;
            foreach($sub2 as $sub)
            {
                $q = "select lhc,lhpw from counttable as a,subject as b where a.sid = b.sid and b.sname = '$sub' and a.section = '$yea'";
                $exe = mysqli_query($con,$q);
                $r = mysqli_fetch_assoc($exe);
                if($r['lhc'] != $r['lhpw'])
                    $flag1 = false;
            }
        }
        $query_check = "select sname from subject where year = 3 and (sid not in (select sid from teaches where year = 3) or sid in (select sid from teaches where year = 3 and section = 'ANY'))";
        $result = mysqli_query($con,$query_check);
        $sub3 = array();
        while($exist = mysqli_fetch_assoc($result))
        {
            array_push($sub3,$exist['sname']);
        }
        $y = "3";
        foreach($year3 as $a)
        {
            $yea = $y.$a;
            foreach($sub3 as $sub)
            {
                $q = "select lhc,lhpw from counttable as a,subject as b where a.sid = b.sid and b.sname = '$sub' and a.section = '$yea'";
                $exe = mysqli_query($con,$q);
                $r = mysqli_fetch_assoc($exe);
                if($r['lhc'] != $r['lhpw'])
                    $flag2 = false;
            }
        }
        if($flag1 && $flag2)
            echo true;
        else
            echo false;
        echo true;
    }
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>