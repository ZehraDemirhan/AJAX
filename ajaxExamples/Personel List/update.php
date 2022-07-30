<?php
    header("Content-Type: application/json");
    session_start() ;
    require "./db.php" ;
    $id = $_GET["id"] ;
    
    if ( isset($_SESSION["person"][$id])) {
        unset($_SESSION["person"][$id]) ;
    } else {
        $_SESSION["person"][$id] = true ;
    }

    echo json_encode(["id" => $id]);