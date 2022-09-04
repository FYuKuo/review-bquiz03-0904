<?php

for ($i=1; $i <11 ; $i++) { 
    $type = rand(1,4);
    echo "INSERT INTO `movie`(`name`, `date`, `time`, `type`, `intro`, `pub`, `director`, `img`, `movie`, `sh`, `rank`) VALUES ('院線片$i','2022-09-04','90','$type','院線片$i 劇情簡介','院線片$i 發行商','院線片$i 導演','03B0$i.png','03B0{$i}v.mp4','1','$i');";
}

?>