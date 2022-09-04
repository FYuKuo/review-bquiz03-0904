<?php
include('./base.php');
$movie = $Movie->find($_GET['movie']);
$now = date('Y-m-d');
$start = $movie['date'];
$days = (strtotime(date('Y-m-d'))-strtotime($movie['date']))/60/60/24;

// echo $days;
for ($i = 0 ; $i <= $days ; $i++) {
    $date = date('Y-m-d',strtotime("+$i days"));
    $dateFront = date('m月d日 l',strtotime("+$i days"));

    echo "<option value='$date'>$dateFront</option>";
}
?>