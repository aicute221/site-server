<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>houtai</title>
    <style>
        body, html, .container{
            height: 100%
        }
        .content{
            float: left;
        }
        .list{
            background-color: #92b901;
            color: white;
            border-radius: 5px;
            padding: 10px;
            margin: 10px 20px 10px 10px;
            width: 80px;
            text-align: center;
            cursor: pointer;
        }
        .right{
            height: 100%;
            width: calc(100% - 150px);
        }
        iframe{
            width: 100%;
            height: 100%;
            border: 1px solid #92b901;
        }

    </style>
</head>
<body>
<div class="container">
    <div class="content left">
        <div class="list" data-src="/admin/articles">博客列表</div>
        <div class="list" data-src="/admin/article">新增博客</div>
    </div>
    <div class="content right">
        <iframe src="/admin/articles">

        </iframe>
    </div>
</div>
</body>
<script src="/js/jquery-3.2.1.js"></script>
<script>
  $(document).ready(function(){
    $(".list").click(function(){
      $("iframe").attr("src", $(this).data("src"));
    })
  })
</script>
</html>