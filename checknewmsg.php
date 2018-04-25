<?php
    session_start();
    $con = mysqli_connect("localhost","root","","lineup");
    $fid = $_SESSION['userid'];
    $q = "select distinct fromid from chatting where toid = $fid group by fromid order by max(sdate) desc, max(stime) desc";
    $e = mysqli_query($con,$q);
    $ids = array();
    while($r = mysqli_fetch_array($e))
    {
        $a = $r['fromid'];
        array_push($ids,$a);
    }
    $msgs = array();
    foreach($ids as $to)
    {
        $q = "select count(msg) as c from chatting where fromid = $to and toid = $fid and status = 0";
        $e = mysqli_query($con,$q);
        $r = mysqli_fetch_assoc($e);
        $c = $r['c'];
        $q1 = "select img,fname from faculty where fid = $to";
        $e1 = mysqli_query($con,$q1);
        $r1 = mysqli_fetch_assoc($e1);
        $img = $r1['img'];
        $name = $r1['fname'];
        echo "<div class='block' id='".$to."' data-toggle='tooltip' data-placement='bottom' title='".$name."'><div class='reschatpicsout'><img class='reschatpics' src='images/fac/".$img."'>";
        if($c > 0)
            echo "<div class='chatcount'>".$c."</div>";
        echo "</div></div>";
    }
?>