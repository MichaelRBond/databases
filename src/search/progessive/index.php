<?php
require "../../engineHeader.php";

if (!isset($_GET['MYSQL']) && !isset($_GET['MYSQL']['q'])) die;

$_GET['MYSQL']['q'] = ($_GET['MYSQL']['q'] && !is_empty($_GET['MYSQL']['q']))?$_GET['MYSQL']['q']:"";
$_GET['MYSQL']['q'] = urldecode($_GET['MYSQL']['q']);

$dbObject  = new databases;
$databases = $dbObject->find($_GET['MYSQL']['q']);

$data = array();
foreach ($databases as $database) {
	$data[] = array("value" => $database['name'], "name" => $database['name']);
}

header("Content-type: application/json");
header("Access-Control-Allow-Origin: *");
echo json_encode($data);

exit;
?>