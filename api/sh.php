<?php
include('./base.php');
$DB = new DB($_POST['table']);
unset($_POST['table']);
$DB->save($_POST);
?>