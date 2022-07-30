<?php
  session_start() ;
  require "./db.php" ;
  // var_dump($_SESSION) ;

  $list = $db->query("select * from personel")->fetchAll(PDO::FETCH_ASSOC) ;

  function progressBar($size) {
      return "<div style='width:{$size}px' class='progressBar'></div>" ;
  }

  function ratings($rate) {
      $str = "" ;
      for ( $i=0 ; $i < $rate; $i++) {
          $str .= "<img src='img/full.png'>" ;
      } 
      for ( $i=0 ; $i < 5 - $rate; $i++) {
          $str .= "<img src='img/empty.png'>" ;
      } 
     return $str ;
  }

  function driver($id, $driver) {
      return $driver ? 
       "<a href='update.php?id=$id'><img src='img/yes.png' /></a>" 
       : 
       "<a href='update.php?id=$id'><img src='img/no.png' /></a>" ;
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="css/iconfont/material-icons.css">
    <link rel="stylesheet" href="css/materialize.min.css">
    <script src="jquery-3.1.1.js"></script>
    <style>
      .progressBar { 
         height: 15px; 
         background-image: linear-gradient(to right, #0F0, #0A0 ) 
       }
       .rating img { padding: 0 2px;}
       td:last-child:hover { background: #DDD;}
       table { margin-bottom: 30px; margin-top: 40px;}
       .info { margin-top: 20px;}
       
    </style>
    <script>
      // AJAX PART
      $(function() {
          $("td a").click(function(e) {
             e.preventDefault();
             var href = $(this).attr("href") ;
             $.get(href, function(data){
                console.log(data.id);
                var link = $("#" + data.id + " a");
                var img = $("img", link) ;
                var span = link.next() ;
                var currentImg = img.attr("src") ;
                if ( currentImg.indexOf("yes") !== -1) {
                    img.attr("src", "img/no.png") ;
                } else {
                    img.attr("src", "img/yes.png") ;
                }
                if ( span.text().indexOf("!") === -1) span.text(" !") ;
                else span.text("") ;
             });
          })
      });
    
    </script>
</head>
<body>
     <div class="container">
        <h1 class="header center orange-text">Personel List</h1>
        <table class="centered">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Progress</th>
                    <th>Location</th>
                    <th>Rating</th>
                    <th>Date of Birth</th>
                    <th>Driver</th>
                 </tr>
            </thead>
            <tbody>
        <?php
            foreach( $list as $personel) {
                $date = (new DateTime( $personel['dob']))->format("d/m/Y") ;
                echo "<tr id={$personel['id']}>" ;
                echo "<td>{$personel['name']}</td>";  
                echo "<td>", progressBar($personel['progress']),"</td>";  
                echo "<td>{$personel['location']}</td>";  
                echo "<td class='rating'>", ratings($personel['rating']) . "</td>";  
                echo "<td>$date</td>";  
                 $id = $personel["id"] ;
                if ( isset($_SESSION["person"][$id])) {
                    echo "<td>", driver($id,!$personel['driver']), "<span> !</span></td> ";
                } else {
                    echo "<td>", driver($id,$personel['driver']), "<span></span></td> ";
                }
                echo "</tr>";
            }
        ?>
            </tbody>
        </table>
        <div class="center">
            <a href="save.php" class="btn btn-large">commit</a>
        </div>

        <div class="center info">
            <?php
                if ( isset($_GET["count"])) {
                    if ( $_GET["count"] > 0) {
                        echo "{$_GET['count']} records updated permanently!" ;
                    } else {
                        echo "Nothing to update!";
                    }

                }
            ?>
        </div>

     </div>
     
     
</body>
</html>