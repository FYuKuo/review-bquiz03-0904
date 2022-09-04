<?php
$order = $Order->find(['no'=>$_GET['no']]);
$sets = unserialize($order['set']);
sort($sets);
?>

<div class="grey0 m-auto w-60 p-10">
    <table class="w-100 m-auto">
        <tr>
            <td colspan="2" class="grey2">
                感謝您的訂購，您的訂單編號是：<?=$order['no']?>
            </td>
        </tr>
        <tr>
            <td class="grey3 w-20">
                電影名稱：
            </td>
            <td class="grey1">
            <?=$Movie->find($order['movie'])['name']?>
            </td>
        </tr>
        <tr>
            <td class="grey2 w-20">
            日期：
            </td>
            <td class="grey1">
            <?=$order['date']?>
            </td>
        </tr>
        <tr>
            <td class="grey3 w-20">
            場次時間：
            </td>
            <td class="grey1">
            <?=$order['session']?>
            </td>
        </tr>
        <tr>
            <td colspan="2" class="grey1">
                座位：
                <?php
                foreach ($sets as $key => $set) {
                ?>
                <div>
                    <?=floor($set/5)+1?>排<?=floor($set%5)+1?>號
                </div>
                <?php
                }
                ?>
            </td>
        </tr>
        <tr>
            <td colspan="2" class="grey2 ct">
                <input type="button" value="確認" onclick="location.href='./index.php'">
            </td>
        </tr>
    </table>
</div>