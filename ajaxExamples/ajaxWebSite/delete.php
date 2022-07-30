<?php
session_start();
header("Content-Type: application/json");
require "db.php";

$id=$_GET['id'];
$stmt=$db->prepare("DELETE from addedcourse where id=?");
$stmt->execute([$id]);
$_SESSION['delete'][]=$id;

echo json_encode(["success" => "ok"]) ;


