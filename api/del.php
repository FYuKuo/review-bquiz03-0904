<?php
include('./base.php');
$DB = new DB($_POST['table']);
$DB->del($_POST['id']);
?>