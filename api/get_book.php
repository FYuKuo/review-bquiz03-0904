<?php
include('./base.php');
$orders = $Order->all(['movie'=>$_GET['movie'],'date'=>$_GET['date'],'session'=>$_GET['session']]);
$set = [];
foreach ($orders as $key => $order) {
    $order['set'] = unserialize($order['set']);
    $set = array_merge($set,$order['set']);
}
?>
<div class="book_bg">
    <div class="book_sets d-f f-w">
        <?php
        for ($i=0; $i < 20 ; $i++) { 
            if(in_array($i,$set)){
        ?>
        <div class="book_set_item d-f f-w hasPeople">
            <div class="ct w-100">
                <?=floor($i/5)+1?>排<?=($i%5)+1?>號
            </div>
        </div>
        <?php
            }else{
        ?>
        <div class="book_set_item d-f f-w">
            <div class="ct w-100">
                <?=floor($i/5)+1?>排<?=($i%5)+1?>號
            </div>
            <input type="checkbox" name="set" class="set" value="<?=$i?>">
        </div>
        <?php
            }
        }
        ?>
    </div>
    <div class="rb ct p-10">
        <div>您選擇的是：<?=$Movie->find($_GET['movie'])['name']?></div>
        <div>您選擇的是：<?=$_GET['date']?> <?=$_GET['session']?></div>
        <div>您已勾選 <span class="qt">0</span>張票，最多可購買四張票</div>
        <div class="ct">
            <input type="button" value="上一步" onclick="$('.book,.order').toggle(),$('.book').html('')">
            <input type="button" value="確定" onclick="checkout()">
        </div>
    </div>
</div>

<script>
function checkout() {
    let movie = '<?=$_GET['movie'];?>';
    let date = '<?=$_GET['date'];?>';
    let session = '<?=$_GET['session'];?>';
    let qt = setArr.length;

    $.post('./api/add_order.php', {
        movie,
        date,
        session,
        set: setArr,
        qt
    }, (no) => {
        location.href = `?do=result&no=${no}`;
    })
}
</script>