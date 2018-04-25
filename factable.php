<?php
    
    $con = mysqli_connect("localhost","root","","lineup");
    if(!$con)
    {
        echo "Server not connected";
    }
    else
    {
        $query = "select fid from faculty order by fid";
        $exe = mysqli_query($con,$query);
        while($r = mysqli_fetch_assoc($exe))
        {
            $name = f.$r["fid"];
            $create = "create table $name(day int,h1 int,h2 int,h3 int,h4 int,h5 int,h6 int,h7 int)";
            $exe1 = mysqli_query($con,$create);
            $i=1;
            while($i<7)
            {
                $create = "insert into $name values('$i',0,0,0,0,0,0,0)";
                $exe1 = mysqli_query($con,$create);
                $i++;
            }
        }
    }
?>