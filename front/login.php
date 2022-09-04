<?php
if(isset($_SESSION['admin'])){
    to('./back.php');
}
?>
<div class="rb ct title p-10">管理登入</div>

<table class="m-auto">
    <tr>
        <td>帳號：</td>
        <td>
            <input type="text" name="acc" id="acc">
        </td>
    </tr>
    <tr>
        <td>密碼：</td>
        <td>
            <input type="password" name="pw" id="pw">
        </td>
    </tr>
    <tr>
        <td colspan="2" class="ct">
            <input type="button" value="登入" onclick="login()">
            <input type="button" value="重置" onclick="reset()">
        </td>
    </tr>
</table>

<script>
    function reset(){
        $('input[type=text],input[type=password]').val('');
    }

    function login(){
        let acc = $('#acc').val();
        let pw = $('#pw').val();

        $.get('./api/login.php',{acc,pw},(res)=>{
            if(parseInt(res) == 1){
                location.href='./back.php';
            }else{
                alert('帳號或密碼錯誤');
                reset();
            }            
        })
    }

</script>