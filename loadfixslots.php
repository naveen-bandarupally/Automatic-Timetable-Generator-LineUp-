<?php
session_start();
    if(!isset($_SESSION["login"]))
    {
        $url = "index.php";
        header('Location:'.$url);
    }
$con = mysqli_connect("localhost","root","","lineup");
if(!$con)
{
    echo "Server not connected";
}
else
{
    $y = 2;
    $sec[2] = 7;
    $sec[3] = 5;
    $sect[1] = "a";
    $sect[2] = "b";
    $sect[3] = "c";
    $sect[4] = "d";
    $sect[5] = "e";
    $sect[6] = "f";
    $sect[7] = "g";
    $day[1] = "MONDAY";
    $day[2] = "TUESDAY";
    $day[3] = "WEDNESDAY";
    $day[4] = "THURSDAY";
    $day[5] = "FRIDAY";
    $day[6] = "SATURDAY";
    echo"<center><p style='font-variant: small-caps; font-weight:bold; font-size:24px; padding-top: 20px;padding-bottom:20px;'>click on cells to fix the slots</p></center>";
    while($y < 4)
    {
        $s = $sec[$y];
        $i = 1;
        while($i <= $s)
        {
            $h=1;
            $d=1;
            $j = 1;
            echo"<center><p style='font-variant: small-caps; font-weight:bold; font-size:24px; padding-top: 20px;padding-bottom:20px;'>year ".$y." section ".$sect[$i]."</p></center>";
            echo "
            <div id='tt' class='table-responsive'>
                <table id='$y$sect[$i]' class='table borderless'>
                  <thead>
                    <tr>
                        <th>DAY</th>
                        <th>08:00 - 08:55<br>01</th>
                        <th>08:55 - 09:50<br>02</th>
                        <th>09:50 - 10:00<br></th>
                        <th>10:10 - 11:05<br>03</th>
                        <th>11:05 - 12:00<br>04</th>
                        <th>12:00 - 12:55<br>05</th>
                        <th>12:55 - 01:55<br></th>
                        <th>01:55 - 02:50<br>06</th>
                        <th>02:55 - 03:45<br>07</th>
                    </tr>
                  </thead>
                  <tbody>";
            $ind = $y.$sect[$i]."_";
            $q = "select * from timetable where sec like '$ind'";
            $exe = mysqli_query($con,$q);
            $j = 1;
            $count = 1;
            while($r = mysqli_fetch_assoc($exe))
            {
                $h = 1;
                echo "<tr>
                     <td>".$day[$j]."</td>";
                if($r["h1"] == "WEEKLY TEST" || $r["h1"] == "ACTIVITIES")
                     echo "<td id='".$y.$sect[$i].$d.$h++."'>".$r["h1"]."</td>";
                else
                    echo "<td class='fixsub' id='".$y.$sect[$i].$d.$h++."'>".$r["h1"]."</td>";
                if($r["h2"] == "WEEKLY TEST" || $r["h2"] == "ACTIVITIES")
                     echo "<td id='".$y.$sect[$i].$d.$h++."'>".$r["h2"]."</td>";
                else
                    echo "<td class='fixsub' id='".$y.$sect[$i].$d.$h++."'>".$r["h2"]."</td>";
                if($count == 1)
                     echo "<td rowspan='6'>B<br>R<br>E<br>A<br>K</td>";
                if($r["h3"] == "WEEKLY TEST" || $r["h3"] == "ACTIVITIES")
                     echo "<td id='".$y.$sect[$i].$d.$h++."'>".$r["h3"]."</td>";
                else
                    echo "<td class='fixsub' id='".$y.$sect[$i].$d.$h++."'>".$r["h3"]."</td>";
                if($r["h4"] == "WEEKLY TEST" || $r["h4"] == "ACTIVITIES")
                     echo "<td id='".$y.$sect[$i].$d.$h++."'>".$r["h4"]."</td>";
                else
                    echo "<td class='fixsub' id='".$y.$sect[$i].$d.$h++."'>".$r["h4"]."</td>";
                if($r["h5"] == "WEEKLY TEST" || $r["h5"] == "ACTIVITIES")
                     echo "<td id='".$y.$sect[$i].$d.$h++."'>".$r["h5"]."</td>";
                else
                    echo "<td class='fixsub' id='".$y.$sect[$i].$d.$h++."'>".$r["h5"]."</td>";
                if($count == 1)
                     echo "<td rowspan='6'>B<br>R<br>E<br>A<br>K</td>";
                if($r["h6"] == "WEEKLY TEST" || $r["h6"] == "ACTIVITIES")
                     echo "<td id='".$y.$sect[$i].$d.$h++."'>".$r["h6"]."</td>";
                else
                    echo "<td class='fixsub' id='".$y.$sect[$i].$d.$h++."'>".$r["h6"]."</td>";
                if($r["h7"] == "WEEKLY TEST" || $r["h7"] == "ACTIVITIES")
                     echo "<td id='".$y.$sect[$i].$d.$h++."'>".$r["h7"]."</td>";
                else
                    echo "<td class='fixsub' id='".$y.$sect[$i].$d.$h++."'>".$r["h7"]."</td>
                     </tr>";
                $d++;
                $j++;
                $count++;
            }
                  echo"</tbody>
                </table>
            </div>";
            $i++;
        }
        $y++;
    }
    echo "<div class='container-fluid' id='createttcon'>
                            <div style='padding-top:50px; padding-bottom:50px;'>
                            <center><span id='concreatelink'>continue to create timetable</span></center>
                            </div>
                        </div>";
}
?>