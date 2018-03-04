<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>sign-in</title>
    <link type="text/css" rel="stylesheet" href="css/admin.css">
</head>
<body>
<div class="sign-in">
    <p>Admin登录</p>
    <div class="line"></div>
    <div>
        <span>账号:</span>
        <input type="text" name="username" class="box"><br>
        <span>密码:</span>
        <input type="password" name="password" class="box"><br>
        <input type="submit" name="submit" value="登录" class="sign">
    </div>
</div>
</body>
<script src="js/jquery-3.2.1.js"></script>
<script>
  $(function(){
    $(".sign").click(function(){
      $.ajax({
//        url: "/site-front/admin/test/login.json",
        url: "/admin_login",
        type: 'post',
        dataType: 'json',
        data: {
          name: $("[name='username']").val(),
          password: $("[name='password']").val()
        },
        success: function(response){
          if(response.status ===1){
            window.location.href=response.data.url
          }
        }
      });
    });


  })
</script>
</html>