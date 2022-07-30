<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <style>
            body { font-family: arial;}
            #main { width: 600px; border:1px solid black; margin: 20px auto; padding: 10px;}
            #addForm { border: 1px solid #666; background: #99ff99; padding: 10px;}
            #listCourses { border: 1px solid #666; background: #aaf; margin-top: 50px;}
            #listCourses table { width: 100%; border-collapse: collapse; }
            td, th { border:1px solid #99f; padding: 10px; text-align: center;}
            tr:first-of-type { background: #99f;}
            select, [type=submit] { font-family: arial; font-size: 16px;}
            #logDiv { border: 1px solid #666; background: #ffff99; display: none; padding: 10px;}
            .btn { background: #EEE; border:1px solid #999; padding: 3px 7px; text-decoration: none; color: #000;;  }
        </style>
        <script src="jquery-3.1.1.min.js" type="text/javascript"></script>
        <script>
        $(function() {
            $('.delete').click(function(e){
               
                e.preventDefault();
                let id=$(this).attr('id');
                $.get("delete.php",{"id":id},function(){
                    $("#"+id).remove();
                });
                name=id.substr(2,4);
                $("select").append(`<option value='${id}'> CTIS ${name} </option>`);
              

            })
           // AJAX part
        });
        </script>
    </head>
    <?php 
    session_start();
    //session_destroy();
    if(!isset($_SESSION['time']))
    $_SESSION['time']=new DateTime();
    //var_dump($_SESSION['time']);

    if(!isset($_SESSION['delete']))
    {
        $_SESSION['delete']=[];
    }
    if(!isset($_SESSION['add']))
    {
        $_SESSION['add']=[];
    }

    require "db.php";
    if(isset($_POST['submited']))
    {
        echo "here";
        extract($_POST);
        $array=$db->query("select * from addedcourse")->fetchAll();
        var_dump($array);
        if(!in_array($id,$array))
        {$stmt=$db->prepare("INSERT into addedcourse (id) VALUES (?)");
        $stmt->execute([$id]);
        $_SESSION['add'][]=$id;}
    
    }
  
    if(isset($_GET['log']
    ))
    {extract($_GET);
   // var_dump($_GET);
    $elapsed = $_SESSION["time"]->diff(new DateTime()) ;
//var_dump($elapsed);
}

    $stmt=$db->query("select * from addedcourse A,courses C where A.id=C.id order by C.id");
    $takenCourses= $stmt->fetchAll(PDO::FETCH_ASSOC);
    var_dump($takenCourses);


    ?>
    <body>
        <div id="main">
            <h3>ADD-DROP FORM</h3>
            <div id="addForm">
                <form action="#" method="post">
                <select name="id">
                    <?php 
                    $stmt=$db->query("select * from courses where id not in (select id from addedcourse)");
                    $optionArray=$stmt->fetchAll(PDO::FETCH_ASSOC);
                    foreach($optionArray as $option)
                    {
                        echo "<option value='{$option['id']}'>{$option['abbr']}</option>";
                    }
                    
                    ?>
                </select>
                    <input name='submited' type="submit" value="ADD">    
                </form>
            </div>
            
            <div id="listCourses">
                <table>
                <tr>
                        <th>Course Code</th>
                        <th>Course Name</th>
                        <th>Credit</th>
                        <th>Lab Work</th>
                        <th>Drop</th>
                </tr>
                    <?php foreach($takenCourses as $course):?>
                        <tr id=<?=$course['id']?>>
                        <th><?=$course['abbr']?></th>
                        <th><?=$course['name']?></th>
                        <th><?=$course['credit']?></th>
                        <th><?=$course['lab']?"<img src='up.png' ":''?></th>
                        <th><a href="" id='<?=$course['id']?>' class='delete'><img src="del.png" alt=""></a></th>
                </tr>
                    
                    <?php endforeach ?>
                    
                </table>
            </div>
          
            

            <p>
                <a href="?log=loged" class="btn">LOG</a>
            </p>
            <div id="logDiv" style='<?=isset($log) ?'display: block;':''?>'>
                Elapsed Time : <?=$elapsed->h?> :<?=$elapsed->i ?>: <?=$elapsed->s?>   <br>
                <p><b>LOG : </b></p>
                
                <ol>
                <?php foreach($_SESSION['delete'] as $deleted):?>
                    <li>DELETE <?= $deleted?> </li>
                <?php endforeach ?>
                <?php foreach($_SESSION['add'] as $added):?>
                    <li>ADD <?= $added?> </li>
                <?php endforeach ?>

                    
                </ol>
            </div>
        </div>
    </body>
</html>
