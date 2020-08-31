<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="//stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="//code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="//stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <title>@yield('title')</title>
    <style>
        h1 {
            text-align: center;
            margin:20px 0;
            font-style:italic;
        }
        h1 a:hover{
            text-decoration: none;
            color: #007bff;
        }
        .username {
            font-size:24px;
            font-style:italic;
        }
        table {
            text-align:center;
        }
        tr.false {
            background-color: #A9A9A9;
        }
        .post {
            margin:16px 0;
        }
        span {
            color:#ff0000;
            font-weight: bold;
        }
        .status {
            border-radius: 5px;
            padding: 0 10px 3px;
        }
        table.table {
            margin-bottom: 50px;
        }
        .table-bordered td {
            vertical-align: middle;
        }
        .sort {
            text-align:right;
            margin:0 10px 10px 0;
        }
        .sort select {
            margin:0 10px;
            border-radius: 5px;
            padding:0 5px 5px;
        }
        input.update {
            background:transparent;
            border:none;
        }
        input.update:focus {
            outline: none;
        }
        th select {
            background:transparent;
            border:none;
            appearance: none; 
            -webkit-appearance: none;
            -moz-appearance: none;
            font-weight: bold;
        }
        th select:focus {
            outline: none;
        }
        .no_list {
            list-style: none;
            font-weight: bold;
            margin:10px 0;
        }
        input.date_field {
            width:150px;
            height: 40px;
        }
        .remark_field {
            height: 100px;
        }
        .popup {
            z-index: 10;
            display: none;
            height: 105vh;
            width: 100%;
            position: fixed;
            top: 0;
            left: 0;
        }
        .popup_content {
            padding: 20px;
            width: 75%;
            border-radius: 10px;
            border:2px solid black;
            background-color:#f0fff0;
        }
        .popup_content p {
            overflow: scroll;
        }
        .show {
            display: flex;
            overflow:visible;
            justify-content: center;
            align-items: center;
        }
        .submit {
            margin-left: 15px;
        }
        label {
            margin-bottom: 0;
        }
        .table-responsive {
            z-index: -1;
        }
        .parent {
            background: #ffd700;
        }
        .underway {
            background: #a9a9a9;
        }
        footer {
            background: #d3d3d3;
            text-align: center;
            padding: 10px 0;
        }
        footer p {
            margin-bottom: 0;
        }
        @media screen and (max-width: 1024px) {
            .hidden {
                display: none;
            }
        }
    </style>
    <script>
        $(function(){
            $('div.text').click(function(){
                if ($(window).width() > 1024) {
                    if(!$(this).hasClass('on')){
                        $(this).addClass('on');
                        var txt = $(this).text();
                        $(this).html('<input type="text" name="body" autocomplete="name" value="'+txt+'" />');
                        $('div > input').focus().blur(function(){
                        var inputVal = $(this).val();
                        //もし空欄だったら空欄にする前の内容に戻す
                        if(inputVal===''){
                            inputVal = this.defaultValue;
                        };
                        //編集が終わったらtextで置き換える
                        $(this).parent().removeClass('on').text(inputVal);
                        });
                    };
                };
            });
            $('.date').click(function(){
                if(!$(this).hasClass('on')){
                    $(this).addClass('on');
                    var txt = $(this).text();
                    $(this).html('<input type="date" name="date" value="'+txt+'" /><input type="submit" value="変更">');
                    $('div > input').focus().blur(function(){
                    var inputVal = $(this).val();
                    //もし空欄だったら空欄にする前の内容に戻す
                    if(inputVal===''){
                        inputVal = this.defaultValue;
                    };
                    });
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

            $('.description').on('click',function(){
                $(this).nextAll('.popup').addClass('show');
            });
            $('.back').on('click',function(){
                $('.popup').removeClass('show');
            });

            $("tr td:has(.moge)").parent().addClass("parent");
            $("tr td:has(.false)").parent().addClass("underway");
        });
    </script>
</head>
<body>
    @yield('content')
    <footer class="fixed-bottom">
        <p class="text"><small>Copyright &copy; Takahiro Koyama All Rights Reserved.</small></p>
    </footer>
</body>
</html>