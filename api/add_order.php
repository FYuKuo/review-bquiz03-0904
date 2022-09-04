<?php
include('./base.php');
$_POST['no'] = date('Ymd') . str_pad($Order->math('MAX','id')+1,4,0,STR_PAD_LEFT);
$_POST['set'] = serialize($_POST['set']);
$Order->save($_POST);
echo $_POST['no'];
?>