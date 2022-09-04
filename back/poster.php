<div class="grey0 p-10">
    <div class="rb title ct p-10">預告片清單</div>
    <table class="ct w-100">
        <tr class="grey1 w-25">
            <td>預告片海報</td>
            <td>預告片片名</td>
            <td>預告片排序</td>
            <td>操作</td>
        </tr>
    </table>
    <form action="./api/edit_poster.php" method="post" enctype="multipart/form-data">
        <div class="poster_list overflow">
            <table class="ct w-100 bcc">
                <?php
                $rows = $Poster->all();
                foreach ($rows as $key => $row) {
                    $pre = ($rows[$key-1]['id'])??$row['id'];
                    $next = ($rows[$key+1]['id'])??$row['id'];
            ?>
                <tr class="white w-25">
                    <td>
                        <img src="./upload/<?=$row['img']?>" alt="" style="height:80px">
                    </td>
                    <td>
                        <input type="text" name="name[]" id="name" value="<?=$row['name']?>">
                    </td>
                    <td>
                        <input type="button" value="往上" onclick="rank(<?=$row['id']?>,<?=$pre?>)">
                        <input type="button" value="往下" onclick="rank(<?=$row['id']?>,<?=$next?>)">
                    </td>
                    <td>
                        <input type="checkbox" name="sh[]" class="sh" value="<?=$row['id']?>"
                            <?=($row['sh'] == 1)?'checked':''?>>顯示
                        <input type="checkbox" name="del[]" class="del" value="<?=$row['id']?>">刪除
                        <select name="ani[]" id="ani">
                            <option value="1" <?=($row['ani'] == 1)?'selected':''?>>淡入淡出</option>
                            <option value="2" <?=($row['ani'] == 2)?'selected':''?>>滑入滑出</option>
                            <option value="3" <?=($row['ani'] == 3)?'selected':''?>>縮放</option>
                        </select>
                    </td>
                    <input type="hidden" name="id[]" value="<?=$row['id']?>">
                </tr>
                <?php
                }
            ?>

            </table>
        </div>
        <div class="ct">

            <input type="submit" value="編輯確定">
            <input type="reset" value="重置">
        </div>
    </form>
</div>

<div class="grey0 p-10">
    <div class="rb title ct p-10">預告片清單</div>
    <form action="./api/add_poster.php" method="post" enctype="multipart/form-data">

        <table class="grey1 ct w-100 ">
            <tr>
                <td>
                    預告片海報：<input type="file" name="img" id="img">
                </td>
                <td>
                    預告片片名：<input type="text" name="name" id="name">
                </td>
            </tr>
            <tr>
                <td colspan="2" class="ct">
                    <input type="submit" value="新增">
                    <input type="reset" value="重置">
                </td>
            </tr>
        </table>
    </form>

</div>