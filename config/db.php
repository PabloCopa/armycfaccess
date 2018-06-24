<?php

$host = 'ec2-54-83-0-158.compute-1.amazonaws.com';
$user = 'whssliqwnmcpwi';
$password = 'b2cc35c97abc8ccdb45745847c8d42a9bb6675cddd5c28dd01ef5f8cb0d64537';
$dbname = 'dn2mklm5v4eis';
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
