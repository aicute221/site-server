<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>{{ $title }}</title>
    <link type="text/css" rel="stylesheet" href="/css/index.css">
    <link rel="stylesheet" type="text/css" href="/css/simditor.css">
    <script>
      var config = {
        id:'{{ $id }}'
      }
    </script>
</head>
<body>
<div class="top" id="top">
    <p class="top-title">...</p>
    <p class="top-sub-title">...</p>
    <p class="author-time author-time-d">Posted by <span class="author">...</span> on <span class="time">...</span></p>
</div>

<div class="container-d">
    <div class="content-d">
        <div class="article">
            <div id="article-content" style="padding: 20px 0;">




            </div>
            {{--<div class="line"></div>--}}
            {{--<div class="box">--}}
                {{--<p class="box-p">PREVIOUS</p>--}}
                {{--<p class="box-p">HELLO BLOG</p>--}}
            {{--</div>--}}
            <div class="line"></div>
        </div>
    </div>
</div>
<div class="footer">
    <p>Copyright © echecho.cn</p>
</div>
<div class="return">
    <a href="#top"><p>返回顶部</p></a>
</div>
</body>
<script src="/js/jquery-3.2.1.js"></script>
<script>
  $(document).ready(function(){
    if(config.id !== ""){
      $.ajax({
        url:'/article/detail',
        type: 'get',
        dataType: 'json',
        data:{
          id: config.id
        },
        success: function(response){
          if(response.status === 1){
            $(".top-title").text(response.data.title);
            $(".top-sub-title").text(response.data.sub_title);
            $(".author").text(response.data.author);
            $(".time").text(response.data.time);
            $("#article-content").html(response.data.content)
          }
        }
      })
    }
  })
</script>
</html>