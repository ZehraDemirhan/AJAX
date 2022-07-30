<?php

   $db = new PDO("mysql:host=localhost;dbname=test", "root", "") ;
   $os = $db->query("select * from os")->fetchAll() ;

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OS Voting</title>
    <script src="js/jquery-3.6.0.min.js"></script>
    <style>
        a { text-decoration: none;}
        #spinner { width: 30px; display: none}
    </style>
</head>
<body>
    <h1>Operating System Voting</h1>
    <table>
        <tr>
            <th>Operating System</th>
            <th>Vote(s)</th>
            <th>Ops</th>
        </tr>
        <?php foreach($os as $o) : ?>
        <tr>
            <td><?= $o["name"] ?></td>
            <td class="vote"><?= $o["vote"] ?></td>
            <td>
                <a href="#" class="upBtn" id="<?= $o["id"] ?>">👍</a>
            </td>
        </tr>
        <?php endforeach ?>
    </table>
    <div>
        <img src="./img/loader.svg" id="spinner">
    </div>
    <script>
        $(".upBtn").click(function(e){
            e.preventDefault() ;
            let id = $(this).attr("id") ;
           // alert("up btn for " + id) ;
           $("#spinner").show() ;
           $.get("up.php", {"id" : id}, function(data){
             // alert(data.vote) ;
             $("#" + data.id).parent().prev().text(data.vote) ;
             $("#spinner").hide() ;
           })
        })
    </script>
</body>
</html>