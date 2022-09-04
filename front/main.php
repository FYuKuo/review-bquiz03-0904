<?php
$posters = $Poster->all(['sh'=>1]," ORDER BY `rank` ")
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
        <table>
            <tbody>
                <tr> </tr>
            </tbody>
        </table>
        <div class="ct"> </div>
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