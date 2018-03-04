<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>table</title>
    <link href="https://use.fontawesome.com/releases/v5.0.7/css/all.css" rel="stylesheet">
    <style>
        table{
            border: 2px solid #eeeeee;
            border-collapse: collapse;
            font-size: 13px;
        }
        tr{
            border: 1px solid #eeeeee;
        }
        th,td{
            text-align: left;
            padding: 10px;
        }
        th{
            background-color: #F0F0F0;
        }
        .fa-trash-alt{
            color: red;
        }
        .fa-comment, .fa-edit{
            color: yellowgreen;
            padding-right: 10px;
        }
        #id, #author{
            width: 100px;
        }
        #title{
            width: 200px;
        }

        #time{
            width: 150px;
        }
        #operate{
            width: 62px;
        }
    </style>
</head>
<body>
<table>
    <thead>
    <tr>
        <th id="id">博文ID</th>
        <th id="title">标题</th>
        <th id="author">作者</th>
        <th id="time">时间</th>
        <th id="operate">操作</th>
    </tr>
    </thead>
    <tbody>
    <!--<tr>-->
    <!--<td>3001364</td>-->
    <!--<td>123</td>-->
    <!--<td>1</td>-->
    <!--<td>2017-09-26 18:51:50</td>-->
    <!--<td>-->
    <!--<a href="" class="comment"><i class="fa fa-comment"></i></a>-->
    <!--<a href="" class="edit"><i class="fa fa-edit"></i></a>-->
    <!--<i class="fa fa-trash-alt"></i>-->
    <!--</td>-->
    <!--</tr>-->
    </tbody>
</table>
</body>
<script src="/js/jquery-3.2.1.js"></script>
<script>
  $(document).ready(function(){
//            $(".fa-trash-alt").click(function(){
//                $(this).parent().parent().remove();
//            })


    $.ajax({
      url:"/article/list",
      type: 'get',
      dataType: 'json',
      data: {},
      success: function(response){
        if(response.status === 1){
          response.data.forEach(function(item){
            var a = '<tr>' +
              '<td>'+item.id+'</td>' +
              '<td>'+item.title+'</td>' +
              '<td>'+ item.author+'</td>' +
              '<td>'+item.time+'</td>' +
              '<td>' +
              '<a href="" class="comment"><i class="fa fa-comment"></i></a>' +
              '<a href="/admin/article/'+ item.id +'" class="edit"><i class="fa fa-edit"></i></a>' +
              '<i class="fa fa-trash-alt"></i>' +
              '</td>' +
              '</tr>';
            $("tbody").append(a);
          })
        }
      }
    })
  })
</script>
</html>