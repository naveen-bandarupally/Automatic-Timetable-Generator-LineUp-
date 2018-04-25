<?php

//$con = mysqli_connect("localhost","root","","lineup");

//$tnames = array();
//$q = "SELECT table_name FROM information_schema.tables where table_schema='lineup'";
//$e = mysqli_query($con,$q);
//while($r = mysqli_fetch_assoc($e))
//{
//    $n = $r['table_name'];
//    array_push($tnames,$n);
//}
//$t = "timetable";
//$backupFile = 'dbfilelineup.sql';
////foreach($tnames as $t)
////{
//    $query = "SELECT * INTO OUTFILE '$backupFile' FROM $t";
//    $result = mysqli_query($con,$query) or die(mysqli_error($con));
// 
//}

$filename = 'mydata.sql';
/**
 * MySQL connection configuration
 */
$database	= 'lineup';
$user		= 'root';
$password	= '';
/**
 * usually it's ok to leave the MySQL host as 'localhost'
 * if your hosting provider instructed you differently, edit the next one as needed
 */
$host = 'localhost';
/**
 * DO NOT EDIT BELOW THIS LINE
 */
$command = "mysqldump -u root lineup > mydata1.sql";
exec( $command,$output);
foreach($output as $o)
    echo $o;
///////// import code ///////////////////




//// Name of the file
//$filename = 'dbfilelineup.sql';
//// MySQL host
//$mysql_host = 'localhost';
//// MySQL username
//$mysql_username = 'root';
//// MySQL password
//$mysql_password = '';
//// Database name
//$mysql_database = 'lineup';
//
//// Connect to MySQL server
//mysqli_connect($mysql_host, $mysql_username, $mysql_password, $mysql_database) or die('Error connecting to MySQL server: ' . mysqli_error());
//
//// Temporary variable, used to store current query
//$templine = '';
//// Read in entire file
//$lines = file($filename);
//// Loop through each line
//foreach ($lines as $line)
//{
//// Skip it if it's a comment
//if (substr($line, 0, 2) == '--' || $line == '')
//    continue;
//// Add this line to the current segment
//$templine .= $line;
//// If it has a semicolon at the end, it's the end of the query
//if (substr(trim($line), -1, 1) == ';')
//{
//    // Perform the query
//    mysqli_query($templine) or print('Error performing query \'<strong>' . $templine . '\': ' . mysqli_error() . '<br /><br />');
//    // Reset temp variable to empty
//    $templine = '';
//}
//}
// echo "Tables imported successfully";
?>