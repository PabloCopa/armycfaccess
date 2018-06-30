<?php 

$host = "ec2-54-163-229-212.compute-1.amazonaws.com";
$port = "5432";
$dbname = "db1dtmnbmah579";
$user = "lwnwsibmeluecn";
$password = "fbd10d0e0bf159244e530cecc56b3260864a4cabbb0a09d0b9ad00dae1b2917f";
$pg_options = "--client_encoding=UTF8";

$connection_string = "host={$host} port={$port} dbname={$dbname} user={$user} password={$password} options='{$pg_options}'";
$dbconn = pg_connect($connection_string);


if($dbconn){
    echo "Connected to ". pg_host($dbconn); 
}else{
    echo "Error in connecting to database.";
}

echo "<br />";
?>