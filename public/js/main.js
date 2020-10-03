$(function(){
    $('div.text').click(function(){
            if(!$(this).hasClass('on')){
                $(this).addClass('on');
                var txt = $(this).text();
                $(this).html('<input type="text" name="body" value="'+txt+'" />');
                $('div.text > input').focus().blur(function(){
                var inputVal = $(this).val();
                //編集が終わったらtextで置き換える
                $(this).parent().removeClass('on').text(inputVal);
                });
            };
    });
    $('.date').click(function(){
        if(!$(this).hasClass('on')){
            $(this).addClass('on');
            var txt = $(this).text();
            $(this).html('<input type="date" name="date" class="show_date" value="'+txt+'" /><input type="submit" class="change_date" value="変更">');
        };
    });

    $('.delete').click(function(){
    if(confirm('本当に削除しますか？いいんですね？タスク完了してなかったら減給ですよ？')){
            /* キャンセルの時の処理 */
            location.href = './index_task_app.blade.php';
        }else{
            /*　OKの時の処理 */
            return false;
        }
    });

    $(".text").change(function(){
        $("#submit_form").submit();
    });

    $('.description .btn').on('click',function(){
        $(this).parent().nextAll('.popup').addClass('show');
        $(".table-responsive").css("overflow-x", "visible");
        $(".table-responsive").css("positon", "relative");
    });
    $('.back').on('click',function(){
        $('.popup').removeClass('show');
        $(".table-responsive").css("overflow-x", "auto");
        $(".table-responsive").css("positon", "static");
    });

    $("tr td:has(.moge)").parent().addClass("parent");
    
    $("tr td:has(.false)").parent().addClass("underway");

    $(".status_popup").on("click", function(){
        $(this).hide("status_popup");
    });
    if($(window).width() < 768) {
        $('.empty_msg').wrap('<div />').parent().addClass("empty");
    };
});