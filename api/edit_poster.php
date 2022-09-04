<?php
include('./base.php');

foreach ($_POST['id'] as $key => $id) {
    if(isset($_POST['del']) && in_array($id,$_POST['del'])){
        $Poster->del($id);
    }else{
        $poster = $Poster->find($id);

        $poster['sh'] = ($_POST['sh']) && in_array($id,$_POST['sh'])?1:0;
        $poster['name'] = $_POST['name'][$key];
        $poster['ani'] = $_POST['ani'][$key];

        $Poster->save($poster);
    }
}
to('../back.php?do=poster');
?>