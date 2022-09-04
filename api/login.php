<?php
include('./base.php');
if($_GET['acc'] == 'admin' && $_GET['pw'] == '1234'){
    $_SESSION['admin'] = 'admin';
    echo 1;
}else{
    echo 0;
}
?>