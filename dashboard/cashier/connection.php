<?php
$host = 'ec2-54-163-229-212.compute-1.amazonaws.com';
$user = 'lwnwsibmeluecn';
$password = 'fbd10d0e0bf159244e530cecc56b3260864a4cabbb0a09d0b9ad00dae1b2917f';
$dbname = 'db1dtmnbmah579';
$port='5432';

  //Set DSN data source name
    $dsn = "pgsql:host=" . $host . ";port=" . $port .";dbname=" . $dbname . ";user=" . $user . ";password=" . $password . ";";

?>
