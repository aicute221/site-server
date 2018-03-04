<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>add_blog</title>
    <link rel="stylesheet" type="text/css" href="/css/simditor.css">
    <style>
        .m-span{
            display: inline-block;
            font-size: 13px;
            font-weight: 500;
            padding: 20px 0 5px 20px;
            width: 55px;
        }
        .box{
            margin: 0 13px;
            padding: 9px;
            width: 320px;
            border: 1px solid #dddddd;
            border-radius: 5px;
        }
        .article{
            display: inline-block;
            padding: 13px;
            width: 1000px;
        }
        .submit{
            color: white;
            background-color: #92b901;
            border-radius: 5px;
            margin: 10px 0 0 92px;
            padding: 8px 18px;
        }
    </style>
    <script>
      var config = {
        id : "{{ $id }}"
      };
    </script>
</head>
<body>
<div>
    <span class="m-span">*标题:</span>
    <input type="text" class="box" name="title"><br>
    <span class="m-span">*副标题:</span>
    <input type="text" class="box" name="sub-title"><br>
    <span class="m-span">*作者:</span>
    <input type="text" class="box" name="author"><br>
    <span class="m-span" style="vertical-align: top">*正文:</span>
    <div class="article">
        <textarea id="editor" autofocus name="article"></textarea>
    </div><br>
    <input type="submit" value="提交" class="submit">
</div>

</body>
<script src="/js/jquery-3.2.1.js"></script>
<script src="/js/module.js"></script>
<script src="/js/hotkeys.js"></script>
<script src="/js/simditor.js"></script>
<script>
  $(function(){
    var editor = new Simditor({
      textarea: $('#editor'),
      placeholder:"写出你的想法...",
      toolbarFloat: true,
      cleanPaste: false
    });

    $(".submit").click(function(){
      $.ajax({
        url:"/admin/add_article",
        type: 'post',
        dataType: 'json',
        data:{
          id: config.id,
          title: $("[name='title']").val(),
          sub_title: $("[name='sub-title']").val(),
          author: $("[name='author']").val(),
          content: editor.getValue()
        },
        success: function(response){
          if(response.status === 1){
            window.location.href=response.data.url;
          }else{
            alert(response.info)
          }
        },
        error: function (response) {
          alert(response.status)
        }
      })
    })

    if(config.id !== ""){
      $.ajax({
        url: "/article/detail",
        type: 'get',
        dataType: 'json',
        data:{
          id: config.id
        },
        success: function(response){
          if(response.status === 1){
            $("[name='title']").val(response.data.title);
            $("[name='sub-title']").val(response.data.sub_title);
            $("[name='author']").val(response.data.author);
            editor.setValue(response.data.content)
          }
        }
      });
    }
  })
</script>
</html>