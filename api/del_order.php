<?php
include('./base.php');
$Order->del(["{$_POST['type']}" => $_POST['val']]);
?>