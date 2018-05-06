<?php
$id = 0;
$data = array();
if( isset($_GET['id']) ) $id = (int)$_GET['id'];
if( $id ){
	include("dbcon.php");
	$sql = "SELECT * FROM blog WHERE id={$id}";
	if( $rs = $db->query($sql) ) {
		$data = $rs->fetch(PDO::FETCH_ASSOC);
	}
}
echo json_encode($data);