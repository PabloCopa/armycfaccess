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


<?php
function page_protect()
{
    session_start();
    
    global $db;
    
    /* Secure against Session Hijacking by checking user agent */
    if (isset($_SESSION['HTTP_USER_AGENT'])) {
        if ($_SESSION['HTTP_USER_AGENT'] != md5($_SERVER['HTTP_USER_AGENT'])) {
            session_destroy();
            header("Location: ../../login/");
            exit();
        }
    }
    
    // before we allow sessions, we need to check authentication key - ckey and ctime stored in database
    
    /* If session not set, check for cookies set by Remember me */
    if (!isset($_SESSION['user_data']) && !isset($_SESSION['logged']) && !isset($_SESSION['auth_level']) && !isset($_SESSION['sex']) && !isset($_SESSION['full_name'])) {
        session_destroy();
        header("Location: ../../login/");
        exit();
    } else {
    }
    $a = $_SESSION['auth_level'];
    if (strpos($a, '5') !== false) {
    } else {
        header("Location: ../../login/");
    }
}
?>