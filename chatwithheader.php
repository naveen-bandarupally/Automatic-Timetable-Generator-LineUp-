<?php
session_start();
$con = mysqli_connect("localhost","root","","lineup");
    $id = $_POST['tid'];
    $q = "select img,fname from faculty where fid = '$id'";
    $e = mysqli_query($con,$q);
    $r = mysqli_fetch_assoc($e);
    $img = $r['img'];
    $fname = $r['fname'];
    echo "<div class='headfull'><div class='left'><img class='chatpics' src='images/fac/".$img."'></div><div class='right'><p>".$fname."</p></div></div>";
?>