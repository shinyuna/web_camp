<?php
$page = 0;
if(isset($_GET['page'])){
    $page = (int)$_GET['page'];
}
if(! $page) $page = 1;
$lists = 10;
$start = ($page - 1) * $lists;


require_once("dbcon.php"); //한 번만 연결
$json = array();

$sql = "SELECT * FROM blog ORDER BY id DESC limit {$start},{$lists}";

if($rs = $db->query($sql)){
    if($data=$rs->fetchAll(PDO::FETCH_ASSOC)){
       $json = $data;
    }
}
echo json_encode($json);