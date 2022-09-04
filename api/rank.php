<?php
include('./base.php');
$DB = new DB($_POST['table']);
$nowData = $DB->find($_POST['id']);
$chData = $DB->find($_POST['chId']);

$tmp = $nowData['rank'];
$nowData['rank'] = $chData['rank'];
$chData['rank'] = $tmp;

$DB->save($nowData);
$DB->save($chData);
?>