<?php
require_once("db.php");
if($_POST['type'] == ""){
	$sql=$conn->prepare("SELECT distinct src FROM route");
	$sql->execute();
	$str = "";
	foreach(($sql->fetchAll()) as $row){
		$str .= "<option value={$row['src']}>{$row['src']}</option>";
	}
}
elseif($_POST['type'] == "destData"){
	$z= $_POST['id'];
	$sql=$conn->prepare("SELECT * from route where src= '$z'");
	$sql->execute();
	$str = "";
	foreach(($sql->fetchAll()) as $row){
		$str .= "<option value='{$row['rid']}'>{$row['dest']}</option>";
	}
}
echo $str;
?>