<?php
    
    $con = mysqli_connect("localhost","root","","lineup");
    if(!$con)
    {
        echo "Server not connected";
    }
    else
    {
        $sect[1] = "a";
        $sect[2] = "b";
        $sect[3] = "c";
        $sect[4] = "d";
        $sect[5] = "e";
        $sect[6] = "f";
        $sect[7] = "g";
        $q = "create table counttable(sid varchar(11),section varchar(11),lhc int, foreign key(sid) references subject(sid))";
        $exe1 = mysqli_query($con,$q);
        $query = "select sid,year from subject order by year";
        $exe2 = mysqli_query($con,$query);
        while($r = mysqli_fetch_assoc($exe2))
        {
            if($r["year"] == 2)
            {
                $i = 1;
                while($i < 8)
                {
                    $s = $r["year"].$sect[$i];
                    $y = $r["sid"];
                    $q3 = "insert into counttable values('$y','$s',0)";
                    $exe3 = mysqli_query($con,$q3);
                    $i++;
                }
            }
            if($r["year"] == 3)
            {
                $i = 1;
                while($i < 6)
                {
                    $s = $r["year"].$sect[$i];
                    $y = $r["sid"];
                    $q3 = "insert into counttable values('$y','$s',0)";
                    $exe3 = mysqli_query($con,$q3);
                    $i++;
                }
            }
        }
    }
?>