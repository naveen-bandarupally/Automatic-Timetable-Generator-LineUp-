<?php

//        $sect[0] = "a";
//        $sect[1] = "b";
//        $sect[2] = "c";
//        $sect[3] = "d";
//        $sect[4] = "e";
//        $sect[5] = "f";
//        $sect[6] = "g";
//        $f = "f";
        $con = mysqli_connect("localhost","root","","lineup");
//        $q = "select fid from faculty";
//        $e = mysqli_query($con,$q);
//        while($r = mysqli_fetch_assoc($e))
//        {
//            $f = "f".$r['fid'];
//            $q1 = "update $f set h1 = 0,h2 = 0,h3 = 0,h4 = 0,h5 = 0,h6 = 0,h7 = 0";
//            $e1 = mysqli_query($con,$q1);
//            
//        }
//        $q1 = "select a.sid,a.sname,a.lhpw,a.year from subject as a where a.stype = 'LAB' and a.sid not in (select b.sid from counttable as b where a.sid = b.sid and  a.lhpw = b.lhc)";
//        $e1 = mysqli_query($con,$q1);
//        $sid = array();
//        $name = array();
//        $lhpw = array();
//        $year = array();
//        $labs = array();
//        while($r1 = mysqli_fetch_assoc($e1))
//        {
//            $id = $r1['sid'];
//            $na = $r1['sname'];
//            $l = $r1['lhpw'];
//            $y = $r1['year']; 
//            array_push($labs,array("id"=>$id,"name"=>$na,"lhpw"=>$l,"year"=>$y));
//        }
//        shuffle($labs);
//        foreach($labs as $a)
//            echo $a['id']." , ".$a['name']."<br>";
//        $sec = array("a","b","c","d","e","f","g");
//        $s = "a";
//        $q2 = "select * from section";
//        $e2 = mysqli_query($con,$q2);
//        $year = array();
//        $year2 = array();
//        $year3 = array();
//        while($r2 = mysqli_fetch_assoc($e2))
//        {
//            $ye = $r2['year'];
//            $se = $r2['sec'];
//            array_push($year,array("year"=>$ye,"sec"=>$se));
//        }
//        foreach($year as $a)
//        {
//            $s = "a";
//            for($i = 0; $i < $a['sec'];$i++)
//            {
//                if($a['year']==2)
//                    array_push($year2,$s);
//                else
//                    array_push($year3,$s);
//                $s++;
//            }
//        }
//        foreach($year2 as $q)
//            echo $q."<br>";
//foreach($year3 as $q)
//            echo $q."<br>";
//    $con = mysqli_connect("localhost","root","","lineup");
//    if(!$con)
//    {
//        echo "Server not connected";
//    }
//    else
//    {
//        mysqli_query($con,"start transaction") or die(mysqli_error());
//        $q = "insert into f4070(h1,h2,h3,h4,h5,h6,h7) values(1,3,2,4,1,3,2)";
//        $e = mysqli_query($con,$q);
//        mysqli_query($con,"savepoint t1") or die(mysqli_error());
//        $q1 = "insert into f4070(h1,h2,h3,h4,h5,h6,h7) values(0,2,0,3,1,2,3)";
//        $e1 = mysqli_query($con,$q1);
//        mysqli_query($con,"savepoint t2") or die(mysqli_error());
//        mysqli_query($con,"rollback to t2") or die(mysqli_error());
//        mysqli_commit($con);
//        echo $w;
//        mysqli_close($con);
        
//        $y = 2;
//        $d = 1;
//        $sec[2] = 7;
//        $sec[3] = 5;
//        $sect[1] = "a";
//        $sect[2] = "b";
//        $sect[3] = "c";
//        $sect[4] = "d";
//        $sect[5] = "e";
//        $sect[6] = "f";
//        $sect[7] = "g";
//        $tt = "tt";
//        $name = "timetable";
//        $query = "create table $name(sec varchar(20),h1 varchar(20),h2 varchar(20),h3 varchar(20),h4 varchar(20),h5 varchar(20),h6 varchar(20),h7 varchar(20))";
//        $exe = mysqli_query($con,$query);
//        $i=2;
//        while($i < 4)
//        {
//            $j = 1;
//            while($j <= $sec[$i])
//            {
//                $k = 1;
//                while($k < 7)
//                {
//                    $val = $i.$sect[$j].$k;
//                    if($k == 1)
//                        $query1 = "insert into $name values('$val','WEEKLY TEST','WEEKLY TEST','','','','','')";
//                    else if($i ==2 && $k == 6)
//                        $query1 = "insert into $name values('$val','ACTIVITIES','ACTIVITIES','','','','','')";
//                    else if($i ==3 && $k == 6)
//                        $query1 = "insert into $name values('$val','','','','ACTIVITIES','ACTIVITIES','','')";
//                    else
//                        $query1 = "insert into $name values('$val','','','','','','','')";
//                    $exe1 = mysqli_query($con,$query1);
//                    $k++;
//                }
//                $j++;
//            }
//            $i++;
//        }
//        $q3 = "select * from timetable where sec = '2a2'";
//        $exe3 = mysqli_query($con,$q3);
//        $re = mysqli_fetch_array($exe3);
//        $rows = count($re)/2;
//        $cd = 0;
//        $i = 0;
//        while($i < $rows)
//        {
//            if($re[$i] == "MS")
//                $cd++;
//            $i++;
//        }
//        echo $cd;
//        $a ="h";
//        $b =2;
//        echo $a.$b."<br>";
//        $c = $a.($b+2);
//        echo $c;
//    }
    

//<!--
//<html>
//    <head>
//        <script>
//            var a = "h";
//            var b = 1;
//            var c = a+(b+1);
//            alert(c);
//        </script>
//        
//    </head>
//<body>
//    </body>
//</html>-->














//    fixlab();
//    fixsub();
//
//    function fixlab(){
//        $f = "f";
//        $con = mysqli_connect("localhost","root","","lineup");
//        mysqli_autocommit($con, false);
//        mysqli_query($con,"insert into f4070(h1,h2,h3) values(1,2,3)");
//        mysqli_savepoint($con,"1");
//        mysqli_query($con,"insert into f4070(h4,h5,h6) values(4,5,6)");
//        mysqli_savepoint($con,"2");
//        if(true)
//            mysqli_rollback($con,"s1");
//        mysqli_commit($con);
//    }
//        $q1 = "select a.sid,a.sname,a.lhpw,a.year from subject as a where a.stype = 'LAB' and a.sid not in (select b.sid from counttable as b where a.sid = b.sid and  a.lhpw = b.lhc)";
//        $e1 = mysqli_query($con,$q1);
//        $labs = array();
//        while($r1 = mysqli_fetch_assoc($e1))
//        {
//            $i = $r1['sid'];
//            $n = $r1['sname'];
//            $l = $r1['lhpw'];
//            $y = $r1['year']; 
//            array_push($labs,array("id"=>$i,"name"=>$n,"lhpw"=>$l,"year"=>$y));
//        }
//        $q2 = "select * from section";
//        $e2 = mysqli_query($con,$q2);
//        $year = array();
//        while($r2 = mysqli_fetch_assoc($e2))
//        {
//            $ye = $r2['year'];
//            $se = $r2['sec'];
//            array_push($year,array("year"=>$ye,"sec"=>$se));
//        }
//        $s = "a";
//        $year2 = array();
//        $year3 = array();
//        foreach($year as $a)
//        {
//            $s = "a";
//            for($i = 0; $i < $a['sec'];$i++)
//            {
//                if($a['year']==2)
//                    array_push($year2,$s);
//                else
//                    array_push($year3,$s);
//                $s++;
//            }
//        }
////        shuffle($year2);
////        shuffle($year3);
////        shuffle($labs);
//        foreach($labs as $lab)
//        {
//            if($lab['year']==2)
//            {
//                echo "year is : ".$lab['year']." sub is : ".$lab['name']."<br>";
//                foreach($year2 as $sec)
//                {
//                    echo "sec is : ".$sec."<br>";
//                    $id = $lab['id'];
//                    $q3 = "select sno,fid from teaches where sid = '$id' and section = '$sec'";
//                    $e3 = mysqli_query($con,$q3);
//                    while($r3 = mysqli_fetch_assoc($e3))
//                    {
//                        $w= $r3['sno'];
//                        $qq = "select fname from faculty where fid = (select fid from teaches where sno = $w)";
//                        $ee = mysqli_query($con,$qq);
//                        $rr = mysqli_fetch_array($ee);
//                        echo $r3['sno']." of ".$r3['fid']." by ".$rr[0]."<br>";
//                    }
//                }
//            }
//            if($lab['year']==3)
//            {
//                echo "year is : ".$lab['year']." sub is : ".$lab['name']."<br>";
//                foreach($year3 as $sec)
//                {
//                    echo "sec is : ".$sec."<br>";
//                    $id = $lab['id'];
//                    $q3 = "select sno,fid from teaches where sid = '$id' and section = '$sec'";
//                    $e3 = mysqli_query($con,$q3);
//                     while($r3 = mysqli_fetch_assoc($e3))
//                    {
//                        $w= $r3['sno'];
//                        $qq = "select fname from faculty where fid = (select fid from teaches where sno = $w)";
//                        $ee = mysqli_query($con,$qq);
//                        $rr = mysqli_fetch_array($ee);
//                        echo $r3['sno']." of ".$r3['fid']." by ".$rr[0]."<br>";
//                    }
//                }
//            }
//            echo "<br><br><br>";
//        }
////            $i = 1;
////            while($i < 8)
////            {
////                $sec = $sect[$i];
////                $q2 = "select sno,fid from teaches where sid = '$id' and section = '$sec'";
////                $e2 = mysqli_query($con,$q2);
////                while($r2 = mysqli_fetch_assoc($e2))
////                {
////                    $sno = $r2["sno"];
////                    $fid = $r2["fid"];
////                    $tname = $f.$fid;
////                    $q3 = "select * from $tname "
////                }
////            }
//            
//    }
//    function fixsub(){
//
//    }


//$f = "f";
//$q= "select sno,fid from teaches where section = 'ANY'";
//$e = mysqli_query($con,$q);
//while($r= mysqli_fetch_assoc($e))
//{
//    $t = $f.$r['fid'];
//    $c = $r['sno'];
//    $q1 = "update $t set h6 = $c,h7 = $c where day = 1 or day = 3";
//    $e1 = mysqli_query($con,$q1);
//}


?>

