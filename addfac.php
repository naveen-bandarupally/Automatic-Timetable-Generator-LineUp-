<?php
    $uid = test_input($_POST["uid"]);
    $upass = test_input($_POST["pwd"]);
    $uname = test_input($_POST["name"]);
    $uphone = test_input($_POST["phone"]);
    $udept = test_input($_POST["dept"]);
    $urole = test_input($_POST["role"]);                  
    $con = mysqli_connect("localhost","root","","lineup");
    if(!$con)
    {
        echo "Server not connected";
    }
    else
    {
        $query_check = "select count(fname) from faculty where fid = '$uid'";
        $e = mysqli_query($con,$query_check);
        $exist = mysqli_fetch_array($e);
        if(!$exist[0])
        {
            $f = "f";
            $query1 = "insert into faculty values('$uid','$uname','$uphone','$urole','$udept','img_icon.jpg')";
            $query2 = "insert into users(id,password) values('$uid','$upass')";
            $name = $f.$uid;
            $create = "create table $name(day int, h1 int, h2 int, h3 int, h4 int, h5 int, h6 int, h7 int)";
            $exe1 = mysqli_query($con,$create);
            $i =1;
            while($i < 7)
            {
                $q = "insert into $name values($i,0,0,0,0,0,0,0)";
                mysqli_query($con,$q);
                $i++;
            }
            $r1 = mysqli_query($con,$query1);
            $r2 = mysqli_query($con,$query2);
            if($r1 && $r2)
            {
                echo "Inserted successfully";
            }
            else
            {
                echo "Error occured Consult administrator";
            }
        }
        else
        {
            echo "User already exists";
        }
    }
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>