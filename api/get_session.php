<?php
include('./base.php');
$movie = $Movie->find($_GET['movie']);
$session = ['14:00~16:00','16:00~18:00','18:00~20:00','20:00~22:00','22:00~24:00'];

if(date('Y-m-d') == $_GET['date']){
    
    $now = floor(date('H')/2)+1;
    $start = (8-$now)+1;
    // echo $now;
    if($now >= 8){

        for ($i = $start ; $i < 5 ; $i++) {
            $qt = $Order->math('SUM','qt',['movie'=>$_GET['movie'],'date'=>$_GET['date'],'session'=>$session[$i]]);
            $set = 20-$qt;
            
            echo "<option value='{$session[$i]}'>{$session[$i]} 剩餘座位 $set </option>";
        }

    }else{

        for ($i = 0 ; $i < 5 ; $i++) {
            $qt = $Order->math('SUM','qt',['movie'=>$_GET['movie'],'date'=>$_GET['date'],'session'=>$session[$i]]);
            $set = 20-$qt;
            
            echo "<option value='{$session[$i]}'>{$session[$i]} 剩餘座位 $set </option>";
        }
    }
    
}else{
    for ($i = 0 ; $i < 5 ; $i++) {
        $qt = $Order->math('SUM','qt',['movie'=>$_GET['movie'],'date'=>$_GET['date'],'session'=>$session[$i]]);
        $set = 20-$qt;
        
        echo "<option value='{$session[$i]}'>{$session[$i]} 剩餘座位 $set </option>";
    }
}


?>