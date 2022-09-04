<?php
include('./base.php');
if(isset($_FILES['img']['tmp_name']) && $_FILES['img']['error'] == 0){
    $_POST['img'] = $_FILES['img']['name'];
    move_uploaded_file($_FILES['img']['tmp_name'],'../upload/'.$_FILES['img']['name']);
}
if(isset($_FILES['movie']['tmp_name']) && $_FILES['movie']['error'] == 0){
    $_POST['movie'] = $_FILES['movie']['name'];
    move_uploaded_file($_FILES['movie']['tmp_name'],'../upload/'.$_FILES['movie']['name']);
}

$_POST['sh'] = 1;
$_POST['rank'] = $Movie->math('MAX','rank')+1;
$_POST['date'] = $_POST['year'].'-'.$_POST['month'].'-'.$_POST['day'];
unset($_POST['year'],$_POST['month'],$_POST['day']);
$Movie->save($_POST);
to('../back.php?do=movie');
?>