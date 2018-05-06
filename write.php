<?php
include("dbcon.php");
$act = "";
$id = 0;
$title = "";
$writer = "";
$content = "";
print_r($_POST);
if( isset($_POST['act']) ) {
	$act = $_POST['act'];
}
if( isset($_POST['id']) ) {
	$id = (int)$_POST['id'];
}
if( isset($_POST['title']) ) {
	$title = $_POST['title'];
}
if( isset($_POST['writer']) ) {
	$writer = $_POST['writer'];
}
if( isset($_POST['content']) ) {
	$content = $_POST['content'];
}

if( $act && $title && $writer && $content ) {

	if( $act == "add" ) {
		$sql = "insert into blog set ";
		$sql .= " title = :title ";
		$sql .= ", writer = :writer ";
		$sql .= ", content = :content ";
		$sql .= ", wdate = now() ";
		$sth = $db->prepare($sql);
		$sth->bindParam(':title', $title, PDO::PARAM_STR);
		$sth->bindParam(':writer', $writer, PDO::PARAM_STR);
		$sth->bindParam(':content', $content, PDO::PARAM_STR);
		$sth->execute();
	} elseif( $act == "update" ) {
		if( $id ) {
			$sql = "update blog set ";
			$sql .= " title = :title ";
			$sql .= ", writer = :writer ";
			$sql .= ", content = :content ";
			$sql .= ", wdate = now() ";
			$sql .= " where id=:id";
			$sth = $db->prepare($sql);
			$sth->bindParam(':title', $title, PDO::PARAM_STR);
			$sth->bindParam(':writer', $writer, PDO::PARAM_STR);
			$sth->bindParam(':content', $content, PDO::PARAM_STR);
			$sth->bindParam(':id', $id, PDO::PARAM_INT);
			$sth->execute();
		}
	} 
}

if( $act == "delete" && $id ) {
	$sql = "delete from blog where id=:id";
	$sth = $db->prepare($sql);
	$sth->bindParam(':id', $id, PDO::PARAM_INT);
	$sth->execute();
}
