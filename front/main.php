<?php
$posters = $Poster->all(['sh'=>1]," ORDER BY `rank` ");
$now = date('Y-m-d');
$start = date('Y-m-d',strtotime('-2 days'));
$num = $Movie->math('COUNT','id'," WHERE `sh` = 1 AND `date` BETWEEN '$start' AND '$now'");
$limit = 4;
$pages = ceil($num/$limit);
$page = ($_GET['page'])??1;
if($page <= 0 || $page > $pages){
    $page = 1;
}
$start = ($page-1)*$limit;
$movies = $Movie->all(" WHERE `sh` = 1 AND `date` BETWEEN '$start' AND '$now' ORDER BY `rank` Limit $start,$limit");
?>
<div class="half" style="vertical-align:top;">
    <h1>預告片介紹</h1>
    <div class="rb tab" style="width:95%;">
        <div class="poster">
            <div class="lists d-f j-c" style="height: 70%;">
                <?php
                foreach ($posters as $key => $poster) {
                ?>
                <div class="p-a ct poster_item" data-ani="<?=$poster['ani']?>">
                    <img src="./upload/<?=$poster['img']?>" alt="" style="height: 250px;">
                    <div>
                    <?=$poster['name']?>
                    </div>
                </div>
                <?php
                }
                ?>
            </div>
            <div class="controls d-f a-c" style="height: 30%;">

            <div class="prebtn" onclick="move('left')"></div>
            <div class="img_nav p-r d-f a-c" style="width: 380px;height:100%">
                <div class="img_nav_item d-f p-10 p-a">
                <?php
                foreach ($posters as $key => $poster) {
                ?>
                    <div class="con_img" onclick="ani(<?=$key?>)">
                        <img src="./upload/<?=$poster['img']?>" alt="" style="height: 80px">
                    </div>
                <?php
                }
                ?>
                </div>
            </div>
            <div class="nextbtn" onclick="move('right')"></div>
            </div>

        </div>
    </div>
</div>


<div class="half">
    <h1>院線片清單</h1>
    <div class="rb tab" style="width:95%;">
        <div class="movie d-f f-w">
            <?php
            foreach ($movies as $key => $movie) {
                switch ($movie['type']) {
                    case 1:
                        $type = '普遍級';
                    break;
                    case 2:
                        $type = '保護級';
                    break;
                    case 3:
                        $type = '輔導級';
                    break;
                    case 4:
                        $type = '限制級';
                    break;
                    
                }
            ?>
            <div class="w-45 p-10 d-f f-w">
                <div class="w-40">
                    <img src="./upload/<?=$movie['img']?>" alt="" style="width: 70px;">
                </div>
                <div class="w-60" style="font-size: 12px;">
                    <div class="p-2"><?=$movie['name']?></div>
                    <div class="p-2">
                    分級：<img src="./icon/03C0<?=$movie['type']?>.png" alt="" style="width: 15px;"><?=$type?>
                    </div>
                    <div class="p-2">
                        上映日期：<?=$movie['date']?>
                    </div>
                </div>
                <div class="w-100 p-10 ct">
                    <input type="button" value="劇情簡介" onclick="location.href='?do=intro&id=<?=$movie['id']?>'">
                    <input type="button" value="線上訂票" onclick="location.href='?do=order&id=<?=$movie['id']?>'">
                </div>
            </div>
            <?php
            }
            ?>
        </div>

        <div class="ct page">
            <?php
            if($page > 1){
            ?>
            <a href="?page=<?=$page-1?>">&lt;</a>
            <?php
            }
            for ($i=1; $i <= $pages ; $i++) { 
            ?>
            <a href="?page=<?=$i?>" class="<?=($page == $i)?'nowPage':''?>"><?=$i?></a>
            <?php
            }

            if($page < $pages){
            ?>
            <a href="?page=<?=$page+1?>">&gt;</a>
            <?php
            }
            ?>
        </div>
    </div>
</div>

<script>
    let page = 0;

    $('.poster_item').eq(0).show();

    let aniTime = setInterval(() => {
        ani()
    }, 3000);

    function ani(num){

        let now = $('.poster_item:visible');
        let next ;

        if(num == undefined){
            if($(now).next().length == 0){
                next = $('.poster_item').eq(0);
            }else{
                next = $(now).next();
            }
        }else{
            next = $('.poster_item').eq(num);
        }

        // console.log(next);

        switch (next.data('ani')) {
            case 1:
                $(now).fadeOut(2000,()=>{

                    $(next).fadeIn(2000);
                });
            break;

            case 2:
                $(now).slideUp(2000,()=>{

                    $(next).slideDown(2000);
                });
            break;

            case 3:
                $(now).hide(2000,()=>{
                    $(next).show(2000);

                });
            break;
        

        }


    }

    function move(type){
        let num = <?=count($posters);?>;
        let limit = 4;
        let pages = num-limit;
        let move;
        let nowLeft = $('.img_nav_item').css('left').split('px')[0];

        switch (type) {
            case 'left':
                if(page >= 0 && page < pages){
                    page++;
                    move = parseInt(nowLeft)-90;
                }
            break;

            case 'right':
                if(page > 0 ){
                    page--;
                    move = parseInt(nowLeft)+90;
                }
            break;
        }
        console.log('page',page);
        console.log('pages',pages);

        $('.img_nav_item').animate({left:move});
    }

    $('.con_img').hover(function(){
        clearInterval(aniTime);
    },function(){
        aniTime = setInterval(() => {
        ani()
    }, 3000);

    })
</script>