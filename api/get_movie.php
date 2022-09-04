<?php
include('./base.php');
$now = date('Y-m-d');
$start = date('Y-m-d',strtotime('-2 days'));
$movies = $Movie->all(" WHERE `sh` = 1 AND `date` BETWEEN '$start' AND '$now' ORDER BY `rank` ");

foreach ($movies as $key => $movie) {
    $selected = ($_GET['id'] == $movie['id'])?'selected':'';
    echo "<option value='{$movie['id']}' $selected>{$movie['name']}</option>";
}
?>