<?php
$id = ($_GET['id'])??0;
?>

<div class="order">
    <div class="rb title ct p-10">線上訂票</div>
    
    <div class="grey0 p-10 w-60 m-auto my-10">
        <table class="ct w-100">
            <tr class="grey2">
                <td class="w-30 p-10">電影：</td>
                <td>
                    <select name="movie" id="movie" style="width: 98%;">
    
                    </select>
                </td>
            </tr>
            <tr class="grey3">
                <td class="w-30 p-10">日期：</td>
                <td>
                    <select name="date" id="date" style="width: 98%;">
    
                    </select>
                </td>
            </tr>
            <tr class="grey2">
                <td class="w-30 p-10">時段：</td>
                <td>
                    <select name="session" id="session" style="width: 98%;">
    
                    </select>
                </td>
            </tr>
            <tr class="grey3">
                <td class="ct p-10" colspan="2">
                    <input type="button" value="確定" onclick="book()">
                    <input type="button" value="重置" onclick="get_movie()">
                </td>
            </tr>
        </table>
    </div>
</div>

<div class="book">
    123
</div>

<script>
    get_movie();

    function get_movie(){
        let id = <?=$id;?>;

        $.get('./api/get_movie.php',{id},(res)=>{
            $('#movie').html(res);
            let movie = $('#movie').val();
            // console.log(movie);

            get_date(movie);
        })
    }

    function get_date(movie){

        $.get('./api/get_date.php',{movie},(res)=>{
            // console.log(res);
            $('#date').html(res);
            let date = $('#date').val();
            // console.log(date);

            get_session(movie,date);

        })
    }

    function get_session(movie,date){

        $.get('./api/get_session.php',{movie,date},(res)=>{
            // console.log(res);
            $('#session').html(res);
        })
    }

    $('#movie').on('change',function(){
        let movie = $(this).val();
        // console.log(movie);
        get_date(movie);
    })

    $('#date').on('change',function(){
        let movie = $('#movie').val();
        let date = $(this).val();
        // console.log(movie);
        get_session(movie,date);
    })


    function book(){
        $('.order').hide();
        $('.book').show();

        let movie = $('#movie').val();
        let date = $('#date').val();
        let session = $('#session').val();

        $.get('./api/get_book.php',{movie,date,session},(res)=>{
            $('.book').html(res);
            setEvent();
        })
    }

    let setArr = new Array();

    function setEvent(){

        $('.set').on('change',function(){
            
            if($(this).prop('checked') == true){

                if(setArr.length < 4){
                    setArr.push($(this).val());
                    $(this).parent().addClass('hasPeople');
                }else{
                    alert('最多僅能購買四張票');
                    $(this).prop('checked',false);
                }
            }else{
                // console.log('123');
                setArr.splice(setArr.indexOf($(this).val()),1);
                $(this).parent().removeClass('hasPeople');
            }

            let qt = setArr.length;

            $('.qt').text(qt);
            // console.log(setArr);
        })
    }
</script>