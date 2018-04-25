<?php
$id = test_input($_POST["id"]);
$con = mysqli_connect("localhost","root","","lineup");
if(!$con)
{
    echo "Server not connected";
}
else
{
    $fid = "f".$id;
    $q = "select h1,h2,h3,h4,h5,h6,h7 from $fid";
    $exe = mysqli_query($con,$q);
        $day[1] = "MONDAY";
        $day[2] = "TUESDAY";
        $day[3] = "WEDNESDAY";
        $day[4] = "THURSDAY";
        $day[5] = "FRIDAY";
        $day[6] = "SATURDAY";
                echo "
                <div class='heading'><p>individual timetable</p></div>
                <br><br>
                <div class='table-responsive'>
                    <table class='table borderless'>
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
                $j = 1;
                $count = 1;
                while($r = mysqli_fetch_assoc($exe))
                {
                    echo "<tr><td>".$day[$j]."</td>";
                    $c = 1;
                    foreach($r as $hour => $sno)
                    {
                        $val = "";
                        $ind = $sno;
                        if($ind != 0)
                        {
                            $q1 = "select year,section from teaches where sno = $ind";
                            $e1 = mysqli_query($con,$q1);
                            $r1 = mysqli_fetch_assoc($e1);
                            $val = $r1['year'].$r1['section'];
                        }
                        if($count == 1 && ($c == 3 || $c == 6))
                            echo "<td rowspan='6'>B<br>R<br>E<br>A<br>K</td>";
                        echo "<td>$val</td>";
                        $c++;
                    }
                    echo "</tr>";
                    $j++;
                    $count++;
                }
                      echo"</tbody>
                    </table>
                </div>";
        $q2 = "select t.year,t.section,s.sname from teaches as t,subject as s where s.sid = t.sid and t.fid = $id";
        $e2 = mysqli_query($con,$q2);
        echo "
                <br><br>
                <div class='heading'><p>teaching subjects</p></div>
                <br><br>
                <div class='table-responsive'>
                    <table class='table borderless'>
                      <thead>
                        <tr>
                            <th>section</th>
                            <th>subject</th>
                        </tr>
                      </thead>
                      <tbody>";
        while($r2 = mysqli_fetch_assoc($e2))
        {
            $sec = $r2['year'].$r2['section'];
            $sub = $r2['sname'];
            echo "<tr><td>".$sec."</td><td>".$sub."</td></tr>";
        }
        echo "</tbody></table></div><br><br><br>";
}

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>