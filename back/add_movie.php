<div class="grey0 p-10">
    <div class="rb title ct p-10">新增院線片</div>

    <form action="./api/add_movie.php" method="post" enctype="multipart/form-data">
    <div class="m-auto w-80">
        <div class="d-f my-10">
            <div class="w-20">
                影片資料
            </div>
            <div class="grey1 w-80">
                <table class="w-100">
                    <tr>
                        <td>
                            片名：
                        </td>
                        <td>
                            <input type="text" name="name" id="name" style="width:96%">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            分級：
                        </td>
                        <td>
                            <select name="type" id="type"> (請選擇分級)
                                <option value="1">普遍級</option>
                                <option value="2">保護級</option>
                                <option value="3">輔導級</option>
                                <option value="4">限制級</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            片長：
                        </td>
                        <td>
                            <input type="text" name="time" id="time" style="width:96%">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            上映日期：
                        </td>
                        <td>
                            <select name="year" id="year">
                                <option value="2022">2022</option>
                                <option value="2023">2023</option>
                            </select>年
                            <select name="month" id="year">
                                <?php
                                for ($i=1; $i <= 12 ; $i++) { 
                                    ?>
                                <option value="<?=$i?>"><?=$i?></option>
                                <?php
                            }
                                ?>
                            </select>月
                            <select name="day" id="year">
                                <?php
                                for ($i=1; $i <= 31 ; $i++) { 
                                    ?>
                                <option value="<?=$i?>"><?=$i?></option>
                                <?php
                            }
                                ?>
                            </select>日
                        </td>
                    </tr>
                    <tr>
                        <td>
                            發行商：
                        </td>
                        <td>
                            <input type="text" name="pub" id="pub" style="width:96%">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            導演：
                        </td>
                        <td>
                            <input type="text" name="director" id="director" style="width:96%">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            預告影片：
                        </td>
                        <td>
                            <input type="file" name="movie" id="movie">
                            <div style="font-size: 12px;color: red;">檔案請使用英文檔名</div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            電影海報：
                        </td>
                        <td>
                            <input type="file" name="img" id="img">
                            <div style="font-size: 12px;color: red;">檔案請使用英文檔名</div>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
        <div class="d-f my-10">
            <div class="w-20">
                影片資料
            </div>
            <div class="w-80">
                <textarea name="intro" id="intro" style="width:98%"></textarea>
            </div>
        </div>
        <hr>
        <div class="ct">

            <input type="submit" value="編輯確定">
            <input type="reset" value="重置">
        </div>
    </div>
    </form>
</div>