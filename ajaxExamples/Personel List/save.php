<?php
  session_start() ;
  require "./db.php" ;

  if ( !isset($_SESSION["person"])) {
      header("Location: index.php?count=0") ;
      exit ;
  }
  $stmt = $db->prepare("update personel set driver = !driver where id = ?") ;
  foreach( array_keys($_SESSION["person"]) as $id ) {
      echo $id, "<br>" ;
      $stmt->execute([$id]) ;
  }
  $count = count($_SESSION["person"]) ;
  $_SESSION = [] ; 

  //var_dump($_SESSION) ;
  header("Location: index.php?count=$count") ;