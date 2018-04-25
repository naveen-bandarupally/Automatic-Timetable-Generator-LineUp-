<?php

    fixlab();
    fixsub();

// function to fix labs in time table

    function fixlab(){
        $f = "f";
        
        // connecting to database
        
        $con = mysqli_connect("localhost","root","","lineup");
        
        // query to retrieve the labs information
        
        $q1 = "select a.sid,a.sname,a.lhpw,a.year from subject as a where a.stype = 'LAB' and a.sid not in (select b.sid from counttable as b where a.sid = b.sid and  a.lhpw = b.lhc)";
        
        $e1 = mysqli_query($con,$q1);
        
        // array to store labs information
        
        $labs = array();
        while($r1 = mysqli_fetch_assoc($e1))
        {
            $i = $r1['sid'];
            $n = $r1['sname'];
            $l = $r1['lhpw'];
            $y = $r1['year']; 
            array_push($labs,array("id"=>$i,"name"=>$n,"lhpw"=>$l,"year"=>$y));
        }
        
        // query to retrieve number of sections for each year
        
        $q2 = "select * from section";
        $e2 = mysqli_query($con,$q2);
        
        // multidimensonal associative array to store section information for each year
        
        $year = array();
        while($r2 = mysqli_fetch_assoc($e2))
        {
            $ye = $r2['year'];
            $se = $r2['sec'];
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
        
        // shuffling the array to arrange them in random order
        
        shuffle($year2);
        shuffle($year3);
        shuffle($labs);
        
        // shuffling finished
        
        foreach($labs as $lab)
        {
            if($lab['year']==3)
            {
                $yy = "3";
//                echo "year is : ".$lab['year']." sub is : ".$lab['name']."<br>";
                
                foreach($year3 as $sec)
                {
                    
//                    echo "sec is : ".$sec."<br>";
                    
                    $id = $lab['id'];
                    
//                     query to retrieve the faculty of specific subject
                    
                    $q3 = "select sno,fid from teaches where sid = '$id' and section = '$sec'";
                    $e3 = mysqli_query($con,$q3);
                    
                    // array to store individual timetables of all the faculty of a specific lab
                    
                    $afac = array();
                    while($r3 = mysqli_fetch_assoc($e3))
                    {
//                        echo $r3['fid']."<br>";
                        $ftable = $f.$r3['fid'];
                        
                        // query to retrieve timetable of individual faculty
                        
                        $q4 = "select * from $ftable";
                        $e4 = mysqli_query($con,$q4);
                        
                        // array to store timetable of individual faculty
                        
                        $fac = array();
                        while($r4 = mysqli_fetch_assoc($e4))
                        {
                            
                            // pushing the retrieved row from an individual faculty timetable into an array
                            array_push($fac,array("h1"=>$r4["h1"],"h2"=>$r4["h2"],"h3"=>$r4["h3"],"h4"=>$r4["h4"],"h5"=>$r4["h5"],"h6"=>$r4["h6"],"h7"=>$r4["h7"]));
                        }
                        
                        // pushing individual faculty timetable into afac array
                        
                        array_push($afac,$fac);
                    }
                    
                    // creating array to store the timetable of a particular section
                    
                    $tt = array();
                    $sect = $lab['year'].$sec."_";
                    
                    // query to retrieve timetable of a particular class
                    
                    $q5 = "select * from timetable where sec like '$sect'";
                    $e5 = mysqli_query($con,$q5);
                    while($r5 = mysqli_fetch_assoc($e5))
                    {
                        // pushing the retrieved row from the section timetable into an array
                        
                        array_push($tt,array("h1"=>$r5['h1'],"h2"=>$r5['h2'],"h3"=>$r5['h3'],"h4"=>$r5['h4'],"h5"=>$r5['h5'],"h6"=>$r5['h6'],"h7"=>$r5['h7'],"lc"=>$r5['lc']));
                    }
                    
                    // creating array to store the labs timetable
                    
                    $alabs = array();
                    $i = 1;
                    $l = "lab";
                    while($i < 5)
                    {
                        $ll = $l.$i;
                        
                        // query to retrieve timetable of a particular lab
                        
                        $q6 = "select * from $ll";
                        $e6 = mysqli_query($con,$q6);
                        
                        // creating array to store timetable of a particular lab
                        
                        $lll = array();
                        while($r6 = mysqli_fetch_assoc($e6))
                        {
                            
                          //  pushing the retrieved row from a lab timetable into an array
                            
                            array_push($lll,array("h1"=>$r6["h1"],"h2"=>$r6["h2"],"h3"=>$r6["h3"],"h4"=>$r6["h4"],"h5"=>$r6["h5"],"h6"=>$r6["h6"],"h7"=>$r6["h7"]));
                        }
                        
                        // pushing the timetable of an entire lab in to an array
                        
                        array_push($alabs,$lll);
                        $i++;
                    }
                    $fc = sizeof($afac);
                    $c = $lab['lhpw'];
                    for($i = 0; $i<6; $i++)
                    {
                        $flag = false;
                        if($tt[$i]['lc'] == 0)
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
                            if($tt[$i]['h1'] == '' && $tt[$i]['h2'] == '' && $tt[$i]['h3'] == '')
                                $cc1++;
                            if($tt[$i]['h2'] == '' && $tt[$i]['h3'] == '' && $tt[$i]['h4'] == '')
                                $cc2++;
                            if($tt[$i]['h4'] == '' && $tt[$i]['h5'] == '' && $tt[$i]['h6'] == '')
                                $cc3++;
                            if($tt[$i]['h5'] == '' && $tt[$i]['h6'] == '' && $tt[$i]['h7'] == '')
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
                                    $section = $yy.$sec.$d;
                                    $q11 = "select sno,fid from teaches where sid = '$id' and section = '$sec'";
                                    $e11 = mysqli_query($con,$q11);
                                    while($r11 = mysqli_fetch_assoc($e11))
                                    {
                                        $sno = $r11['sno'];
                                        $fid = $r11['fid'];
                                        $facid = $f.$fid;
                                        $q7 = "update $facid set $h1 = $sno,$h2 = $sno,$h3 = $sno where day = $d";
                                        $e7 = mysqli_query($con,$q7) or die(mysqli_error($con));
                                    }
                                    $q8 = "select sname from subject as s,teaches as t where t.sno = '$sno' and s.sid = t.sid";
                                    $e8 = mysqli_query($con,$q8) or die(mysqli_error($con));
                                    $r8 = mysqli_fetch_assoc($e8);
                                    $sname = $r8['sname'];
                                    $q9 = "update timetable set $h1 = '$sname',$h2 = '$sname',$h3 = '$sname',lc = 1 where sec = '$section'";
                                    $e9 = mysqli_query($con,$q9) or die(mysqli_error($con));
                                    $q10 = "update $slab set $h1 = $sno,$h2 = $sno,$h3 = $sno where day = $d";
                                    $e10 = mysqli_query($con,$q10) or die(mysqli_error($con));
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
                                    $section = $yy.$sec.$d;
                                    $q11 = "select sno,fid from teaches where sid = '$id' and section = '$sec'";
                                    $e11 = mysqli_query($con,$q11);
                                    while($r11 = mysqli_fetch_assoc($e11))
                                    {
                                        $sno = $r11['sno'];
                                        $fid = $r11['fid'];
                                        $facid = $f.$fid;
                                        $q7 = "update $facid set $h1 = $sno,$h2 = $sno,$h3 = $sno where day = '$d'";
                                        $e7 = mysqli_query($con,$q7) or die(mysqli_error($con));
                                    }
                                    $q8 = "select sname from subject as s,teaches as t where t.sno = '$sno' and s.sid = t.sid";
                                    $e8 = mysqli_query($con,$q8) or die(mysqli_error($con));
                                    $r8 = mysqli_fetch_assoc($e8);
                                    $sname = $r8['sname'];
                                    $q9 = "update timetable set $h1 = '$sname',$h2 = '$sname',$h3 = '$sname',lc = 1 where sec = '$section'";
                                    $e9 = mysqli_query($con,$q9) or die(mysqli_error($con));
                                    $q10 = "update $slab set $h1 = $sno,$h2 = $sno,$h3 = $sno where day = $d";
                                    $e10 = mysqli_query($con,$q10) or die(mysqli_error($con));
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
                                    $section = $yy.$sec.$d;
                                    $q11 = "select sno,fid from teaches where sid = '$id' and section = '$sec'";
                                    $e11 = mysqli_query($con,$q11);
                                    while($r11 = mysqli_fetch_assoc($e11))
                                    {
                                        $sno = $r11['sno'];
                                        $fid = $r11['fid'];
                                        $facid = $f.$fid;
                                        $q7 = "update $facid set $h1 = $sno,$h2 = $sno,$h3 = $sno where day = $d";
                                        $e7 = mysqli_query($con,$q7) or die(mysqli_error($con));
                                    }
                                    $q8 = "select sname from subject as s,teaches as t where t.sno = '$sno' and s.sid = t.sid";
                                    $e8 = mysqli_query($con,$q8) or die(mysqli_error($con));
                                    $r8 = mysqli_fetch_assoc($e8);
                                    $sname = $r8['sname'];
                                    $q9 = "update timetable set $h1 = '$sname',$h2 = '$sname',$h3 = '$sname',lc = 1 where sec = '$section'";
                                    $e9 = mysqli_query($con,$q9) or die(mysqli_error($con));
                                    $q10 = "update $slab set $h1 = $sno,$h2 = $sno,$h3 = $sno where day = $d";
                                    $e10 = mysqli_query($con,$q10) or die(mysqli_error($con));
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
                                    $section = $yy.$sec.$d;
                                    $q11 = "select sno,fid from teaches where sid = '$id' and section = '$sec'";
                                    $e11 = mysqli_query($con,$q11);
                                    while($r11 = mysqli_fetch_assoc($e11))
                                    {
                                        $sno = $r11['sno'];
                                        $fid = $r11['fid'];
                                        $facid = $f.$fid;
                                        $q7 = "update $facid set $h1 = $sno,$h2 = $sno,$h3 = $sno where day = $d";
                                        $e7 = mysqli_query($con,$q7);
                                    }
                                    $q8 = "select sname from subject as s,teaches as t where t.sno = '$sno' and s.sid = t.sid";
                                    $e8 = mysqli_query($con,$q8) or die(mysqli_error($con));
                                    $r8 = mysqli_fetch_assoc($e8);
                                    $sname = $r8['sname'];
                                    $q9 = "update timetable set $h1 = '$sname',$h2 = '$sname',$h3 = '$sname',lc = 1 where sec = '$section'";
                                    $e9 = mysqli_query($con,$q9) or die(mysqli_error($con));
                                    $q10 = "update $slab set $h1 = $sno,$h2 = $sno,$h3 = $sno where day = $d";
                                    $e10 = mysqli_query($con,$q10) or die(mysqli_error($con));
                                    $flag = true;
                                }
                            }
                        }
                        if($flag)
                            break;
                    }    
                }
            }
            if($lab['year']==2)
            {
                $yy = "2";
//                echo "year is : ".$lab['year']." sub is : ".$lab['name']."<br>";
                
                foreach($year2 as $sec)
                {
                    
//                    echo "sec is : ".$sec."<br>";
                    
                    $id = $lab['id'];
                    
//                     query to retrieve the faculty of specific subject
                    
                    $q3 = "select sno,fid from teaches where sid = '$id' and section = '$sec'";
                    $e3 = mysqli_query($con,$q3);
                    
                    // array to store individual timetables of all the faculty of a specific lab
                    
                    $afac = array();
                    while($r3 = mysqli_fetch_assoc($e3))
                    {
//                        echo $r3['fid']."<br>";
                        $ftable = $f.$r3['fid'];
                        
                        // query to retrieve timetable of individual faculty
                        
                        $q4 = "select * from $ftable";
                        $e4 = mysqli_query($con,$q4);
                        
                        // array to store timetable of individual faculty
                        
                        $fac = array();
                        while($r4 = mysqli_fetch_assoc($e4))
                        {
                            
                            // pushing the retrieved row from an individual faculty timetable into an array
                            array_push($fac,array("h1"=>$r4["h1"],"h2"=>$r4["h2"],"h3"=>$r4["h3"],"h4"=>$r4["h4"],"h5"=>$r4["h5"],"h6"=>$r4["h6"],"h7"=>$r4["h7"]));
                        }
                        
                        // pushing individual faculty timetable into afac array
                        
                        array_push($afac,$fac);
                    }
                    
                    // creating array to store the timetable of a particular section
                    
                    $tt = array();
                    $sect = $lab['year'].$sec."_";
                    
                    // query to retrieve timetable of a particular class
                    
                    $q5 = "select * from timetable where sec like '$sect'";
                    $e5 = mysqli_query($con,$q5);
                    while($r5 = mysqli_fetch_assoc($e5))
                    {
                        // pushing the retrieved row from the section timetable into an array
                        
                        array_push($tt,array("h1"=>$r5['h1'],"h2"=>$r5['h2'],"h3"=>$r5['h3'],"h4"=>$r5['h4'],"h5"=>$r5['h5'],"h6"=>$r5['h6'],"h7"=>$r5['h7'],"lc"=>$r5['lc']));
                    }
                    
                    // creating array to store the labs timetable
                    
                    $alabs = array();
                    $i = 1;
                    $l = "lab";
                    while($i < 5)
                    {
                        $ll = $l.$i;
                        
                        // query to retrieve timetable of a particular lab
                        
                        $q6 = "select * from $ll";
                        $e6 = mysqli_query($con,$q6);
                        
                        // creating array to store timetable of a particular lab
                        
                        $lll = array();
                        while($r6 = mysqli_fetch_assoc($e6))
                        {
                            
                          //  pushing the retrieved row from a lab timetable into an array
                            
                            array_push($lll,array("h1"=>$r6["h1"],"h2"=>$r6["h2"],"h3"=>$r6["h3"],"h4"=>$r6["h4"],"h5"=>$r6["h5"],"h6"=>$r6["h6"],"h7"=>$r6["h7"]));
                        }
                        
                        // pushing the timetable of an entire lab in to an array
                        
                        array_push($alabs,$lll);
                        $i++;
                    }
                    $fc = sizeof($afac);
                    $c = $lab['lhpw'];
                    for($i = 0; $i<6; $i++)
                    {
                        $flag = false;
                        if($tt[$i]['lc'] == 0)
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
                            if($tt[$i]['h1'] == '' && $tt[$i]['h2'] == '' && $tt[$i]['h3'] == '')
                                $cc1++;
                            if($tt[$i]['h2'] == '' && $tt[$i]['h3'] == '' && $tt[$i]['h4'] == '')
                                $cc2++;
                            if($tt[$i]['h4'] == '' && $tt[$i]['h5'] == '' && $tt[$i]['h6'] == '')
                                $cc3++;
                            if($tt[$i]['h5'] == '' && $tt[$i]['h6'] == '' && $tt[$i]['h7'] == '')
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
                                    $section = $yy.$sec.$d;
                                    $q11 = "select sno,fid from teaches where sid = '$id' and section = '$sec'";
                                    $e11 = mysqli_query($con,$q11);
                                    while($r11 = mysqli_fetch_assoc($e11))
                                    {
                                        $sno = $r11['sno'];
                                        $fid = $r11['fid'];
                                        $facid = $f.$fid;
                                        $q7 = "update $facid set $h1 = $sno,$h2 = $sno,$h3 = $sno where day = $d";
                                        $e7 = mysqli_query($con,$q7) or die(mysqli_error($con));
                                    }
                                    $q8 = "select sname from subject as s,teaches as t where t.sno = '$sno' and s.sid = t.sid";
                                    $e8 = mysqli_query($con,$q8) or die(mysqli_error($con));
                                    $r8 = mysqli_fetch_assoc($e8);
                                    $sname = $r8['sname'];
                                    $q9 = "update timetable set $h1 = '$sname',$h2 = '$sname',$h3 = '$sname',lc = 1 where sec = '$section'";
                                    $e9 = mysqli_query($con,$q9) or die(mysqli_error($con));
                                    $q10 = "update $slab set $h1 = $sno,$h2 = $sno,$h3 = $sno where day = $d";
                                    $e10 = mysqli_query($con,$q10) or die(mysqli_error($con));
                                    $flag = "true";
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
                                    $section = $yy.$sec.$d;
                                    $q11 = "select sno,fid from teaches where sid = '$id' and section = '$sec'";
                                    $e11 = mysqli_query($con,$q11);
                                    while($r11 = mysqli_fetch_assoc($e11))
                                    {
                                        $sno = $r11['sno'];
                                        $fid = $r11['fid'];
                                        $facid = $f.$fid;
                                        $q7 = "update $facid set $h1 = $sno,$h2 = $sno,$h3 = $sno where day = $d";
                                        $e7 = mysqli_query($con,$q7) or die(mysqli_error($con));
                                    }
                                    $q8 = "select sname from subject as s,teaches as t where t.sno = '$sno' and s.sid = t.sid";
                                    $e8 = mysqli_query($con,$q8) or die(mysqli_error($con));
                                    $r8 = mysqli_fetch_assoc($e8);
                                    $sname = $r8['sname'];
                                    $q9 = "update timetable set $h1 = '$sname',$h2 = '$sname',$h3 = '$sname',lc = 1 where sec = '$section'";
                                    $e9 = mysqli_query($con,$q9) or die(mysqli_error($con));
                                    $q10 = "update $slab set $h1 = $sno,$h2 = $sno,$h3 = $sno where day = $d";
                                    $e10 = mysqli_query($con,$q10) or die(mysqli_error($con));
                                    $flag = "true";
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
                                    $section = $yy.$sec.$d;
                                    $q11 = "select sno,fid from teaches where sid = '$id' and section = '$sec'";
                                    $e11 = mysqli_query($con,$q11);
                                    while($r11 = mysqli_fetch_assoc($e11))
                                    {
                                        $sno = $r11['sno'];
                                        $fid = $r11['fid'];
                                        $facid = $f.$fid;
                                        $q7 = "update $facid set $h1 = $sno,$h2 = $sno,$h3 = $sno where day = $d";
                                        $e7 = mysqli_query($con,$q7) or die(mysqli_error($con));
                                    }
                                    $q8 = "select sname from subject as s,teaches as t where t.sno = '$sno' and s.sid = t.sid";
                                    $e8 = mysqli_query($con,$q8) or die(mysqli_error($con));
                                    $r8 = mysqli_fetch_assoc($e8);
                                    $sname = $r8['sname'];
                                    $q9 = "update timetable set $h1 = '$sname',$h2 = '$sname',$h3 = '$sname',lc = 1 where sec = '$section'";
                                    $e9 = mysqli_query($con,$q9) or die(mysqli_error($con));
                                    $q10 = "update $slab set $h1 = $sno,$h2 = $sno,$h3 = $sno where day = $d";
                                    $e10 = mysqli_query($con,$q10) or die(mysqli_error($con));
                                    $flag = "true";
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
                                    $section = $yy.$sec.$d;
                                    $q11 = "select sno,fid from teaches where sid = '$id' and section = '$sec'";
                                    $e11 = mysqli_query($con,$q11);
                                    while($r11 = mysqli_fetch_assoc($e11))
                                    {
                                        $sno = $r11['sno'];
                                        $fid = $r11['fid'];
                                        $facid = $f.$fid;
                                        $q7 = "update $facid set $h1 = $sno,$h2 = $sno,$h3 = $sno where day = $d";
                                        $e7 = mysqli_query($con,$q7) or die(mysqli_error($con));
                                    }
                                    $q8 = "select sname from subject as s,teaches as t where t.sno = '$sno' and s.sid = t.sid";
                                    $e8 = mysqli_query($con,$q8) or die(mysqli_error($con));
                                    $r8 = mysqli_fetch_assoc($e8);
                                    $sname = $r8['sname'];
                                    $q9 = "update timetable set $h1 = '$sname',$h2 = '$sname',$h3 = '$sname',lc = 1 where sec = '$section'";
                                    $e9 = mysqli_query($con,$q9) or die(mysqli_error($con));
                                    $q10 = "update $slab set $h1 = $sno,$h2 = $sno,$h3 = $sno where day = $d";
                                    $e10 = mysqli_query($con,$q10) or die(mysqli_error($con));
                                    $flag = "true";
                                }
                            }
                        }
                        if($flag)
                            break;
                    }    
                }
            }
//            echo "<br><br><br>";
        }       
    }

// function to fix subjects (theory) in time table

    function fixsub(){

    }
?>