<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>首页</title>
    <link type="text/css" rel="stylesheet" href="css/index.css">
</head>
<body>
    <div class="top" id="top">
        <p class="top-title">Aicute221</p>
    </div>

    <div class="container">
        <div class="content">
            <div class="article-list list" id="articles">
                <!--<div class="article-item">-->
                    <!--<h1 class="title">Hello 2015 - by Hux</h1>-->
                    <!--<p class="sub-title">"Hello World, Hello Blog"</p>-->
                    <!--<p class="summary">-->
                        <!--<i>“Yeah It’s on. ” 前言 Hux 的 Blog 就这么开通了。 跳过废话，直接看技术实现 2015 年，Hux 总算有个地方可以好好写点东西了。 作为一个程序员</i>-->
                    <!--</p>-->
                    <!--<p class="author-time">-->
                        <!--<i>-->
                            <!--<span class="author">从楠楠</span>-->
                            <!--<span class="time">2018-02-25</span>-->
                        <!--</i>-->
                    <!--</p>-->
                <!--</div>-->
                <!--<div class="line"></div>-->
            </div>
            <div class="example-list list" id="examples">
                <!--<div class="example-item">-->
                    <!--<img src="image/js.jpg">-->
                    <!--<p>轮播图样例</p>-->
                <!--</div>-->
            </div>
        </div>
    </div>
    <div class="footer">
        <p>Copyright © echoecho.cn</p>
    </div>
    <div class="return">
        <a href="#top"><p>返回顶部</p></a>
    </div>

</body>
<script src="js/jquery-3.2.1.js"></script>
<script>
    $(function(){

        $.ajax({
//            url: "/site-front/www/test/article.json",
            url: "/article/list",
            type: 'get',
            dataType: "json",
            data: {},
            success: function(response){
                console.log(response);
              if (response.status === 1){
                response.data.forEach(function(item){
                  var c = '<a href="/article/page/' + item.id +'" target="_blank">'+
                    '<div class="article-item">'+
                    '<h1 class="title">' + item.title + '</h1>'+
                    '<p class="sub-title">' + item.sub_title + '</p>'+
                    '<p class="summary">'+
                    '<i>' + item.summary + '</i>'+
                    '</p>'+
                    '<p class="author-time">'+
                    '<i>'+
                    '<span class="author">' + item.author + '</span>'+' '+
                    '<span class="time">' + item.time + '</span>'+
                    '</i>'+
                    '</p>'+
                    '</div>'+
                    '</a>'+
                    '<div class="line"></div>';

                  $("#articles").append(c);
                });
              }
            },
            error: function (response) {
                console.log(response.status)
            }
        });

        $.ajax({
//           url: "/site-front/www/test/example.json",
           url: "/example/list",
           type: "get",
           dataType: "json",
           data: {},
           success: function(response){
               if(response.status === 1){
                   response.data.forEach(function(item){
                     var a = '<a href="/example/page/' + item.name + '" target="_blank">'+
                         '<div class="example-item">' +
                         '<img src="'+item.cover_url+'">' +
                         '<p>'+ item.title +'</p>' +
                         '</div>'+
                         '</a>';
                       $("#examples").append(a);
                   });
               }
           },
           error: function (response) {
                console.log(response.status)
            }
        });

    });
</script>
</html>