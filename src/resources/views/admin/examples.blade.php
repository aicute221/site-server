<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>table_example</title>
    <link href="https://use.fontawesome.com/releases/v5.0.7/css/all.css" rel="stylesheet">
    <link href="/css/table.css" rel="stylesheet" type="text/css">
</head>
<body>
<table>
    <thead>
    <tr>
        <th id="id">ID</th>
        <th id="title">标题</th>
        <th id="type">类型</th>
        <th id="name">名字</th>
        <th id="operate">操作</th>
    </tr>
    </thead>
    <tbody>
    <!--<tr>-->
    <!--<td>title</td>-->
    <!--<td>type</td>-->
    <!--<td>name</td>-->
    <!--<td>-->
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
    $.ajax({
      url:'/example/list',
      type: 'get',
      dataType: 'json',
      data: {},
      success: function(response){
        if(response.status === 1){
          response.data.forEach(function(item){
            var a = '<tr>' +
              '<td>'+item.id+'</td>' +
              '<td>'+item.title+'</td>' +
              '<td>'+item.type+'</td>' +
              '<td>'+item.name+'</td>' +
              '<td>' +
              '<a href="/admin/example/' + item.id + '" class="edit"><i class="fa fa-edit"></i></a>' +
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