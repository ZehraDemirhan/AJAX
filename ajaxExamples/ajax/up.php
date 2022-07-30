<?php

  header("Content-Type: application/json") ;
  
  $db = new PDO("mysql:host=localhost;dbname=test", "std", "") ;
  $id = $_GET["id"] ;

  $stmt = $db->prepare("update os set vote = vote + 1 where id = ? ") ;
  $stmt->execute([$id]) ;

  $stmt = $db->prepare("select * from os where id = ?") ;
  $stmt->execute([$id]) ;
  $os = $stmt->fetch() ;
  sleep(1); // wait 1 second to make it slower to see "loader/spinner" icon.
  echo json_encode(["id" => $id, "vote" => $os["vote"]]) ; 

