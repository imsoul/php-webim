<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <link href="/static/css/bootstrap.css" rel="stylesheet">
    <script src="/static/js/jquery.js"></script>
    <script src="/static/js/bootstrap.js"></script>
    <title>聊天室基于swoole扩展和框架</title>
</head>
<body>
<style>
    * {
        font-size: 14px;
    }

    body {
        background-color: rgb(131, 131, 131);
    }

    input {
        height: 36px;
        margin: 5px;
    }

    .login {
        width: 600px;
        margin: 200px auto;
    }

    #show_avatar {
        width: 120px;
        position: relative;
        left: 420px;
        top: -140px;
    }

    #show_avatar img {
        border-radius: 8px;
    }
</style>
<script>
    /* db_connect('my.db', function(db) {

     }); */
    function falert(text) {
        $('#alert_msg').html(text)
    }
    function checkForm(o) {
        var name = $.trim($('input[name=name]').val());
        var avatar = $.trim($('input[name=avatar]').val());
        if (name == '' || name == '请输入一个昵称') {
            falert("请输入一个昵称^-^");
            o.name.focus();
            return false;
        }
        if (avatar == '' || avatar == '请输入头像图片URL') {
            falert("请输入头像的图片，有图有真相。^-^");
            o.name.focus();
            return false;
        }
        return true;
    }
    function showAvatar(pic) {
        if (pic == '') {
            return
        }
        $('#avatar_pic').attr('src', pic);
        $('#avatar_pic').show();
    }
    function pic_error(o) {
        $(o).hide();
        falert("图片不存在，请重新填写一个吧。^-^");
        $('input[name=avatar]').val('');
    }
</script>

<div class='container login'>
    <form action="/page/chatroom/" method="get" class="well"
          onsubmit="return checkForm(this)" style="height: 162px">
        <h3>Swoole WebIM(基于swoole扩展和框架开发的Web即时沟通工具)</h3>
        <input type="text" name="name" value="请输入一个昵称"
               onfocus="this.value=''; this.onfocus=null">(您的昵称)</br>
        <input type="text"
               name="avatar" value="请输入头像图片URL" onfocus="this.value=''; this.onfocus=null"
               onblur="showAvatar(this.value)">(微博小头像URL，50x50)</br>
        <input type="submit" class="btn btn-primary" value="Login" id="login_submit">
        <input type="reset" class="btn" value="Reset">
        <span style="color: green; padding-top: 10px;margin-left: 15px;" id="alert_msg"></span>

        <div id="show_avatar">
            <img id='avatar_pic' width=100 style="display: none" onerror='pic_error(this)'></img>
        </div>
    </form>
</div>
</body>
</html>
