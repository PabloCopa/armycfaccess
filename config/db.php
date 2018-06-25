<?php

$host = 'ec2-54-163-229-212.compute-1.amazonaws.com';
$user = 'lwnwsibmeluecn';
$password = 'fbd10d0e0bf159244e530cecc56b3260864a4cabbb0a09d0b9ad00dae1b2917f';
$dbname = 'db1dtmnbmah579';
$port='5432';

try{
  //Set DSN data source name
    $dsn = "pgsql:host=" . $host . ";port=" . $port .";dbname=" . $dbname . ";user=" . $user . ";password=" . $password . ";";


  //create a pdo instance
  $pdo = new PDO($dsn, $user, $password);
  $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_OBJ);
  $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch (PDOException $e) {
echo 'Connection failed: ' . $e->getMessage();
}
  ?>
