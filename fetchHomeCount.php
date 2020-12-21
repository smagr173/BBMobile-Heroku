<?php
session_start();
include "functions.php";

    $total = 0;
    
    $record = $_SESSION['record'];
    $email = $record['email'];
    
    $favCount = getFavCount($email);
    $favs = $favCount['count'];
    
    $msg['countFavs'] = $favs;
    
    $actCount = getActiveCount($email);
    $act = $actCount['count'];
    
    $msg['countAct'] = $act;
    
    $prevCount = getPrevCount($email);
    $prev = $prevCount['count'];
    
    $msg['countPrev'] = $prev;
    
    $total = $act + $prev;
    
    $msg['countTotal'] = $total;
    
    echo json_encode($msg);  // Display messages in JSON format 
?>