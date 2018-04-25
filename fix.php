<?php
    $con = mysqli_connect("localhost","root","","lineup");
    if(!$con)
    {
        echo "Error occured while connecting to database";
    }
    else
    {
       
        
        // code to fix labs
        
        $q1 = "select * from section";
        $e1 = mysqli_query($con,$q1) or die(mysqli_error($con));
        $tt = array();
        while($r1 = mysqli_fetch_assoc($e1))
        {
            $year = $r1['year'];
            $sec = "a";
            for($i = 0 ; $i < $r1['sec'] ; $i++)
            {
                $sect = $r1['year'].$sec."_";
                $count = 0;
                $q2 = "select * from timetable where sec like '$sect'";
                $e2 = mysqli_query($con,$q2) or die(mysqli_error($con));
                while($r2 = mysqli_fetch_assoc($e2))
                {
                    if($r2['h1'] == '' && $r2['h2'] == '' && $r2['h3'] == '')
                        $count++;
                    if($r2['h2'] == '' && $r2['h3'] == '' && $r2['h4'] == '')
                        $count++;
                    if($r2['h4'] == '' && $r2['h5'] == '' && $r2['h6'] == '')
                        $count++;
                    if($r2['h5'] == '' && $r2['h6'] == '' && $r2['h7'] == '')
                        $count++;
                }
                array_push($tt,array("ec"=>$count,"sec"=>$sec,"year"=>$year));
                $sec++;
            }
        }
        asort($tt);
        foreach($tt as $t)
        {
//            echo "count : ".$t['ec']." section : ".$t['sec']." year : ".$t['year']."<br>";
            $year = $t['year'];
            $sec = $t['sec'];
            $q3 = "select t.sid,s.sname from subject as s,teaches as t where t.sid = s.sid and t.year = $year and t.section = '$sec' and s.stype = 'lab' group by t.sid";
            $e3 = mysqli_query($con,$q3) or die(mysqli_error($con));
            while($r3 = mysqli_fetch_assoc($e3))
            {
//                echo "sid : ".$r3['sid']." name : ".$r3['sname']."<br>";
                $sid = $r3['sid'];
                $sect = $year.$sec;
                $q4 = "select lhc,lhpw from counttable as c,subject as s where c.sid = s.sid and section = '$sect' and c.sid = '$sid'";
                $e4 = mysqli_query($con,$q4) or die(mysqli_error($con));
                $r4 = mysqli_fetch_assoc($e4);
                $lhpw = $r4['lhpw'];
                if($r4['lhc'] == $r4['lhpw'])
                    continue;
                else
                {
                    $f = "f";
                    $q5 = "select sno,fid from teaches where sid = '$sid' and section = '$sec' and year = $year";
                    $e5 = mysqli_query($con,$q5) or die(mysqli_error($con));
                    $afac = array();
                    while($r5 = mysqli_fetch_assoc($e5))
                    {
                        $fid = $r5['fid'];
                        $ftn = $f.$fid;
                        $sno = $r5['sno'];
                        $q6 = "select * from $ftn";
                        $e6 = mysqli_query($con,$q6);
                        
                        // array to store timetable of individual faculty
                        
                        $fac = array();
                        while($r6 = mysqli_fetch_assoc($e6))
                        {
                            
                            // pushing the retrieved row from an individual faculty timetable into an array
                            array_push($fac,array("sno"=>$sno,"h1"=>$r6["h1"],"h2"=>$r6["h2"],"h3"=>$r6["h3"],"h4"=>$r6["h4"],"h5"=>$r6["h5"],"h6"=>$r6["h6"],"h7"=>$r6["h7"]));
                        }
                        
                        // pushing individual faculty timetable into afac array
                        
                        array_push($afac,$fac);
                    }
                    $ett = array();
                    $section = $sect."_";
                    
                    // query to retrieve timetable of a particular class
                    
                    $q7 = "select * from timetable where sec like '$section'";
                    $e7 = mysqli_query($con,$q7) or die(mysqli_error($con));
                    while($r7 = mysqli_fetch_assoc($e7))
                    {
                        // pushing the retrieved row from the section timetable into an array
                        
                        array_push($ett,array("h1"=>$r7['h1'],"h2"=>$r7['h2'],"h3"=>$r7['h3'],"h4"=>$r7['h4'],"h5"=>$r7['h5'],"h6"=>$r7['h6'],"h7"=>$r7['h7'],"lc"=>$r7['lc']));
                    }
                    
                    // creating array to store the labs timetable
                    
                    $alabs = array();
                    $i = 1;
                    $l = "lab";
                    while($i < 5)
                    {
                        $ll = $l.$i;
                        
                        // query to retrieve timetable of a particular lab
                        
                        $q8 = "select * from $ll";
                        $e8 = mysqli_query($con,$q8) or die(mysqli_error($con));
                        
                        // creating array to store timetable of a particular lab
                        
                        $lll = array();
                        while($r8 = mysqli_fetch_assoc($e8))
                        {
                            
                          //  pushing the retrieved row from a lab timetable into an array
                            
                            array_push($lll,array("h1"=>$r8["h1"],"h2"=>$r8["h2"],"h3"=>$r8["h3"],"h4"=>$r8["h4"],"h5"=>$r8["h5"],"h6"=>$r8["h6"],"h7"=>$r8["h7"]));
                        }
                        
                        // pushing the timetable of an entire lab in to an array
                        
                        array_push($alabs,$lll);
                        $i++;
                    }
                    $fc = sizeof($afac);
                    $c = $lhpw;
                    for($i = 0; $i<6; $i++)
                    {
                        $flag = false;
                        if($ett[$i]['lc'] == 0)
                        {
                            $c1 = 0;
                            $c2 = 0;
                            $c3 = 0;
                            $c4 = 0;
                            $cl = 99;
                            $cc1 = 0;
                            $cc2 = 0;
                            $cc3 = 0;
                            $cc4 = 0;
                            for($j=0 ;$j<$fc; $j++)
                            {
                                if($afac[$j][$i]['h1'] == 0 && $afac[$j][$i]['h2'] == 0 && $afac[$j][$i]['h3'] == 0)
                                    $c1++;
                                if($afac[$j][$i]['h2'] == 0 && $afac[$j][$i]['h3'] == 0 && $afac[$j][$i]['h4'] == 0)
                                    $c2++;
                                if($afac[$j][$i]['h4'] == 0 && $afac[$j][$i]['h5'] == 0 && $afac[$j][$i]['h6'] == 0)
                                    $c3++;
                                if($afac[$j][$i]['h5'] == 0 && $afac[$j][$i]['h6'] == 0 && $afac[$j][$i]['h7'] == 0)
                                    $c4++;
                            }
                            if($ett[$i]['h1'] == '' && $ett[$i]['h2'] == '' && $ett[$i]['h3'] == '')
                                $cc1++;
                            if($ett[$i]['h2'] == '' && $ett[$i]['h3'] == '' && $ett[$i]['h4'] == '')
                                $cc2++;
                            if($ett[$i]['h4'] == '' && $ett[$i]['h5'] == '' && $ett[$i]['h6'] == '')
                                $cc3++;
                            if($ett[$i]['h5'] == '' && $ett[$i]['h6'] == '' && $ett[$i]['h7'] == '')
                                $cc4++;
                            if($c1 == $fc && $cc1 == 1)
                            {
                                $sflag = false;
                                for($m = 0;$m < 4; $m++)
                                {
                                    if($alabs[$m][$i]['h1'] == 0 && $alabs[$m][$i]['h2'] == 0 && $alabs[$m][$i]['h3'] == 0)
                                    {
                                        $cl = $m;
                                        $cl++;
                                        $sflag = true;
                                    }
                                }
                                $slab = $l.$cl;
                                if($sflag)
                                {
                                    $sno = "";
                                    $h1 = "h1";
                                    $h2 = "h2";
                                    $h3 = "h3";
                                    $d = $i+1;
                                    $section = $year.$sec.$d;
                                    $q9 = "select sno,fid from teaches where sid = '$sid' and section = '$sec' and year = $year";
                                    $e9 = mysqli_query($con,$q9) or die(mysqli_error($con));
                                    while($r9 = mysqli_fetch_assoc($e9))
                                    {
                                        $sno = $r9['sno'];
                                        $fid = $r9['fid'];
                                        $facid = $f.$fid;
                                        $q10 = "update $facid set $h1 = $sno,$h2 = $sno,$h3 = $sno where day = $d";
                                        $e10 = mysqli_query($con,$q10) or die(mysqli_error($con));
                                    }
                                    $q11 = "select sname from subject as s,teaches as t where t.sno = '$sno' and s.sid = t.sid";
                                    $e11 = mysqli_query($con,$q11) or die(mysqli_error($con));
                                    $r11 = mysqli_fetch_assoc($e11);
                                    $sname = $r11['sname'];
                                    $q12 = "update timetable set $h1 = '$sname',$h2 = '$sname',$h3 = '$sname',lc = 1 where sec = '$section'";
                                    $e12 = mysqli_query($con,$q12) or die(mysqli_error($con));
                                    $q13 = "update $slab set $h1 = $sno,$h2 = $sno,$h3 = $sno where day = $d";
                                    $e13 = mysqli_query($con,$q13) or die(mysqli_error($con));
                                    $q14 = "update counttable set lhc = $lhpw where sid = '$sid' and section = '$sect'";
                                    $e14 = mysqli_query($con,$q14) or die(mysqli_error($con));
                                    $flag = true;
                                }
                            }
                            else if($c2 == $fc && $cc2 == 1)
                            {
                                $sflag = false;
                                for($m = 0;$m < 4; $m++)
                                {
                                    if($alabs[$m][$i]['h2'] == 0 && $alabs[$m][$i]['h3'] == 0 && $alabs[$m][$i]['h4'] == 0)
                                    {
                                        $cl = $m;
                                        $cl++;
                                        $sflag = true;
                                    }
                                }
                                $slab = $l.$cl;
                                if($sflag)
                                {
                                    $sno = "";
                                    $h1 = "h2";
                                    $h2 = "h3";
                                    $h3 = "h4";
                                    $d = $i+1;
                                    $section = $year.$sec.$d;
                                    $q9 = "select sno,fid from teaches where sid = '$sid' and section = '$sec'";
                                    $e9 = mysqli_query($con,$q9) or die(mysqli_error($con));
                                    while($r9 = mysqli_fetch_assoc($e9))
                                    {
                                        $sno = $r9['sno'];
                                        $fid = $r9['fid'];
                                        $facid = $f.$fid;
                                        $q10 = "update $facid set $h1 = $sno,$h2 = $sno,$h3 = $sno where day = '$d'";
                                        $e10 = mysqli_query($con,$q10) or die(mysqli_error($con));
                                    }
                                    $q11 = "select sname from subject as s,teaches as t where t.sno = '$sno' and s.sid = t.sid";
                                    $e11 = mysqli_query($con,$q11) or die(mysqli_error($con));
                                    $r11 = mysqli_fetch_assoc($e11);
                                    $sname = $r11['sname'];
                                    $q12 = "update timetable set $h1 = '$sname',$h2 = '$sname',$h3 = '$sname',lc = 1 where sec = '$section'";
                                    $e12 = mysqli_query($con,$q12) or die(mysqli_error($con));
                                    $q13 = "update $slab set $h1 = $sno,$h2 = $sno,$h3 = $sno where day = $d";
                                    $e13 = mysqli_query($con,$q13) or die(mysqli_error($con));
                                    $q14 = "update counttable set lhc = $lhpw where sid = '$sid' and section = '$sect'";
                                    $e14 = mysqli_query($con,$q14) or die(mysqli_error($con));
                                    $flag = true;
                                }
                            }
                            else if($c3 == $fc && $cc3 == 1)
                            {
                                $sflag = false;
                                for($m = 0;$m < 4; $m++)
                                {
                                    if($alabs[$m][$i]['h4'] == 0 && $alabs[$m][$i]['h5'] == 0 && $alabs[$m][$i]['h6'] == 0)
                                    {
                                        $cl = $m;
                                        $cl++;
                                        $sflag = true;
                                    }
                                }
                                $slab = $l.$cl;
                                if($sflag)
                                {
                                    $sno = "";
                                    $h1 = "h4";
                                    $h2 = "h5";
                                    $h3 = "h6";
                                    $d = $i+1;
                                    $section = $year.$sec.$d;
                                    $q9 = "select sno,fid from teaches where sid = '$sid' and section = '$sec'";
                                    $e9 = mysqli_query($con,$q9) or die(mysqli_error($con));
                                    while($r9 = mysqli_fetch_assoc($e9))
                                    {
                                        $sno = $r9['sno'];
                                        $fid = $r9['fid'];
                                        $facid = $f.$fid;
                                        $q10 = "update $facid set $h1 = $sno,$h2 = $sno,$h3 = $sno where day = $d";
                                        $e10 = mysqli_query($con,$q10) or die(mysqli_error($con));
                                    }
                                    $q11 = "select sname from subject as s,teaches as t where t.sno = '$sno' and s.sid = t.sid";
                                    $e11 = mysqli_query($con,$q11) or die(mysqli_error($con));
                                    $r11 = mysqli_fetch_assoc($e11);
                                    $sname = $r11['sname'];
                                    $q12 = "update timetable set $h1 = '$sname',$h2 = '$sname',$h3 = '$sname',lc = 1 where sec = '$section'";
                                    $e12 = mysqli_query($con,$q12) or die(mysqli_error($con));
                                    $q13 = "update $slab set $h1 = $sno,$h2 = $sno,$h3 = $sno where day = $d";
                                    $e13 = mysqli_query($con,$q13) or die(mysqli_error($con));
                                    $q14 = "update counttable set lhc = $lhpw where sid = '$sid' and section = '$sect'";
                                    $e14 = mysqli_query($con,$q14) or die(mysqli_error($con));
                                    $flag = true;
                                }
                            }
                            else if($c4 == $fc && $cc4 == 1)
                            {
                                $sflag = false;
                                for($m = 0;$m < 4; $m++)
                                {
                                    if($alabs[$m][$i]['h5'] == 0 && $alabs[$m][$i]['h6'] == 0 && $alabs[$m][$i]['h7'] == 0)
                                    {
                                        $cl = $m;
                                        $cl++;
                                        $sflag = true;
                                    }
                                }
                                $slab = $l.$cl;
                                if($sflag)
                                {
                                    $sno = "";
                                    $h1 = "h5";
                                    $h2 = "h6";
                                    $h3 = "h7";
                                    $d = $i+1;
                                    $section = $year.$sec.$d;
                                    $q9 = "select sno,fid from teaches where sid = '$sid' and section = '$sec'";
                                    $e9 = mysqli_query($con,$q9) or die(mysqli_error($con));
                                    while($r9 = mysqli_fetch_assoc($e9))
                                    {
                                        $sno = $r9['sno'];
                                        $fid = $r9['fid'];
                                        $facid = $f.$fid;
                                        $q10 = "update $facid set $h1 = $sno,$h2 = $sno,$h3 = $sno where day = $d";
                                        $e10 = mysqli_query($con,$q10);
                                    }
                                    $q11 = "select sname from subject as s,teaches as t where t.sno = '$sno' and s.sid = t.sid";
                                    $e11 = mysqli_query($con,$q11) or die(mysqli_error($con));
                                    $r11 = mysqli_fetch_assoc($e11);
                                    $sname = $r11['sname'];
                                    $q12 = "update timetable set $h1 = '$sname',$h2 = '$sname',$h3 = '$sname',lc = 1 where sec = '$section'";
                                    $e12 = mysqli_query($con,$q12) or die(mysqli_error($con));
                                    $q13 = "update $slab set $h1 = $sno,$h2 = $sno,$h3 = $sno where day = $d";
                                    $e13 = mysqli_query($con,$q13) or die(mysqli_error($con));
                                    $q14 = "update counttable set lhc = $lhpw where sid = '$sid' and section = '$sect'";
                                    $e14 = mysqli_query($con,$q14) or die(mysqli_error($con));
                                    $flag = true;
                                }
                            }
                        }
                        if($flag)
                            break;
                    }
                }
            }
        }
        
                               // code to fix electives
        
        
        $q = "select * from subject where stype = 'ELECTIVE'";
        $e = mysqli_query($con,$q) or die(mysqli_error($con));
        while($r = mysqli_fetch_assoc($e))
        {
            $sid = $r['sid'];
            $sname = $r['sname'];
            $year = $r['year'];
            $sem = $r['sem'];
            $lhpw = $r['lhpw'];
            $q0 = "select fid from teaches where sid = '$sid'";
            $e0 = mysqli_query($con,$q0) or die(mysqli_error($con));
            $ftt = array();
            while($r0 = mysqli_fetch_assoc($e0))
            {
                $fid = $r0['fid'];
                $ftn = "f".$fid;
                $q01 = "select * from $ftn";
                $e01 = mysqli_query($con,$q01) or die(mysqli_error($con));
                $ft = array();
                while($r01 = mysqli_fetch_assoc($e01))
                {
                    array_push($ft,array($r01["h1"],$r01["h2"],$r01["h3"],$r01["h4"],$r01["h5"],$r01["h6"],$r01["h7"]));
                }
                array_push($ftt,$ft);
            }
            $q1 = "select * from section where year = $year";
            $e1 = mysqli_query($con,$q1) or die(mysqli_error($con));
            $stt = array();
            while($r1 = mysqli_fetch_assoc($e1))
            {
                $sec = "a";
                for($i = 0 ; $i < $r1['sec'] ; $i++)
                {
                    $sect = $year.$sec."_";
                    $count = 0;
                    $st = array();
                    $q2 = "select * from timetable where sec like '$sect'";
                    $e2 = mysqli_query($con,$q2) or die(mysqli_error($con));
                    while($r2 = mysqli_fetch_assoc($e2))
                    {
                        array_push($st,array($r2["h1"],$r2["h2"],$r2["h3"],$r2["h4"],$r2["h5"],$r2["h6"],$r2["h7"]));
                    }
                    array_push($stt,$st);
                    $sec++;
                }
            }
            $hours = array();
            for($i=0;$i<6;$i++)
            {
                array_push($hours,$i);
            }
            array_push($hours,$i);
            $cc = 0;
                for($j=0;$j<6 && $cc<($lhpw*7);$j++)
                {
                    $flag = false;
                    shuffle($hours);
                    foreach($hours as $h)
                    {
                        echo " day is : ".($j+1)." hour is : ".$h."<br><br>";
                        $c1 = 0;
                        $c2 = 0;
                        $c3 = 0;
                        $c4 = 0;
                        foreach($ftt as $ft)
                        {
                            if($ft[$j][$h] == 0)
                                $c1++;
//                            echo $ft[$j][$h]."<br>";
                            $c2++;
                        }
//                        echo "c1 : ".$c1." c2 : ".$c2."<br>";
                        foreach($stt as $st)
                        {
                            if($st[$j][$h] == "")
                                $c3++;
//                            echo "qqq ".$st[$j][$h]."<br>";
                            $c4++;
                        }
//                        echo "c3 : ".$c3." c4 : ".$c4."<br>";
                        if($c1 == $c2 && $c3 == $c4)
                        {
                            // code to fix slots for electives for all sections at a time
                            $q02 = "select sec from section where year = $year";
                            $e02 = mysqli_query($con,$q02) or die(mysqli_error($con));
                            $r02 = mysqli_fetch_assoc($e02);
                            $seccount = $r02['sec'];
                            $sec = "a";
                            for($l=1;$l<=$seccount;$l++)
                            {
                                $ho = "h".($h+1);
                                $d = $j+1;
                                $ss = $year.$sec.$d;
                                $sss = $year.$sec;
                                $q03 = "update timetable set $ho = '$sname' where sec = '$ss'";
                                $e03 = mysqli_query($con,$q03) or die(mysqli_error($con));
                                $q04 = "update counttable set lhc = lhc+1 where sid = '$sid' and section = '$sss'";
                                $e04 = mysqli_query($con,$q04) or die(mysqli_error($con));
//                                echo "sec : ".$ss." ".$sss." hour : ".$ho."<br>";
                                $sec++;
                                $cc++;
                            }
                            $q05 = "select fid,sno from teaches where sid = '$sid'";
                            $e05 = mysqli_query($con,$q05) or die(mysqli_error($con));
                            while($r05 = mysqli_fetch_assoc($e05))
                            {
                                $ftn = "f".$r05['fid'];
                                $sno = $r05['sno'];
                                $ho = "h".($h+1);
                                $d = $j+1;
//                                echo "sno : ".$sno."<br>";
                                $q06 = "update $ftn set $ho = $sno where day = $d";
                                $e06 = mysqli_query($con,$q06) or die(mysqli_error($con));
                            }
                            echo "<br>";
                            break;
                        }
                    }
                }
        } 

        
        // from here the code is to fix theory subjects
        
        
        $q15 = "select fid,count(fid) as count from teaches as t,subject as s where t.sid = s.sid group by fid order by count(fid) desc";
        $e15 = mysqli_query($con,$q15);
        while($r15 = mysqli_fetch_assoc($e15))
        {
            $f = "f";
            $fid = $r15['fid'];
            $q16 = "select t.sno,s.sname,t.section,t.year,t.sid,s.lhpw from teaches as t,subject as s where t.sid = s.sid and s.stype in ('theory','seminar') and fid = $fid";
            $e16 = mysqli_query($con,$q16);
            while($r16 = mysqli_fetch_assoc($e16))
            {
                $sno = $r16['sno'];
                $sec = $r16['section'];
                $year = $r16['year'];
                $sid = $r16['sid'];
                $lhpw = $r16['lhpw'];
                $sname = $r16['sname'];
                $sect = $year.$sec;
                $q17 = "select lhc from counttable where section = '$sect' and sid = '$sid'";
                $e17 = mysqli_query($con,$q17);
                $r17 = mysqli_fetch_assoc($e17);
                $lhc = $r17['lhc'];
                if($lhc == $lhpw)
                    continue;
                else
                {
                    $tname = $f.$fid;
                    $q18 = "select * from $tname";
                    $e18 = mysqli_query($con,$q18);
                    $fac = array();
                    while($r18 = mysqli_fetch_assoc($e18))
                    {
                        array_push($fac,array($r18["h1"],$r18["h2"],$r18["h3"],$r18["h4"],$r18["h5"],$r18["h6"],$r18["h7"]));
                    }
                    $tt = array();
                    $sect = $year.$sec."_";
                    
                    // query to retrieve timetable of a particular class
                    
                    $q19 = "select * from timetable where sec like '$sect'";
                    $e19 = mysqli_query($con,$q19) or die(mysqli_error($con));
                    while($r19 = mysqli_fetch_assoc($e19))
                    {
                        // pushing the retrieved row from the section timetable into an array
                        
                        array_push($tt,array($r19['h1'],$r19['h2'],$r19['h3'],$r19['h4'],$r19['h5'],$r19['h6'],$r19['h7']));
                    }
                    $days = array();
                    $hours = array();
                    for($i=0;$i<6;$i++)
                    {
                        array_push($days,$i);
                        array_push($hours,$i);
                    }
                    array_push($hours,$i);
                    shuffle($days);
                    foreach($days as $d)
                    {
                        shuffle($hours);
                        foreach($hours as $hh)
                        {
                            
                            if($fac[$d][$hh] == 0 && $tt[$d][$hh] == "" && $lhc < $lhpw)
                            {
//                                echo "hai<br>";
                                $hour = "h".($hh+1);
                                $section = $year.$sec.($d+1);
//                                echo "hour : ".$hour." section : ".$section."<br>";
                                $day = $d+1;
//                                echo $sname." day : ".$day."<br>";
                                $q20 = "update timetable set $hour = '$sname' where sec like '$section'";
                                $e20 = mysqli_query($con,$q20) or die(mysqli_error($con));
                                $q21 = "update $tname set $hour = $sno where day = '$day'";
                                $e21 = mysqli_query($con,$q21) or die(mysqli_error($con));
                                $se = $year.$sec;
                                $q22 = "update counttable set lhc = lhc+1 where sid = '$sid' and section = '$se'";
                                $e22 = mysqli_query($con,$q22) or die(mysqli_error($con));
                                $lhc++;
                                break;
                            }
                        }
                    }
                }
            }
        }
    }
?>