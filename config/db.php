<?php

$host = 'ec2-54-163-229-212.compute-1.amazonaws.com';
$user = 'vihvumibcjnltu';
$password = '51d96e25503757810a2b85139a7f589c235b4f4a603305147a2cfcf098edb08c';
$dbname = 'd4t5a55eckd9jh';
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
