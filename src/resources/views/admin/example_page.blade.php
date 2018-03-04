<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>add_example</title>
    <link rel="stylesheet" type="text/css" href="/css/add.css">
    <script>
      var config = {
        id: "{{ $id }}"
      }
    </script>
</head>
<body>
<div>
    <span class="m-span">*标题</span>
    <input type="text" class="box" name="title"><br>
    <span class="m-span">*类型</span>
    <select name="type">
        <option value="html">html</option>
        <option value="css">css</option>
        <option value="js">js</option>
    </select>
    <br>
    <span class="m-span">*名字</span>
    <input type="text" class="box" name="name"><br>
    <input type="submit" class="submit">
</div>
</body>
<script src="/js/jquery-3.2.1.js"></script>
<script>
  $(document).ready(function(){
    if(config.id !== ""){
      $.ajax({
//        url:'/site-front/admin/test/add_example.json',
        url: '/admin/example_json',
        type: 'get',
        dataType: 'json',
        data: {
          id: config.id
        },
        success: function(response){
          if(response.status === 1){
            $("[name='title']").val(response.data.title);
            $("[name='type']").val(response.data.type);
            $("[name='name']").val(response.data.name);
          }
        }
      })
    }

    $(".submit").click(function(){
      $.ajax({
        url:'/admin/add_example',
        type: 'post',
        dataType: 'json',
        data: {
          id: config.id,
          title: $("[name='title']").val(),
          type: $("[name='type']").val(),
          name: $("[name='name']").val()
        },
        success: function(response){
          if(response.status === 1){
            window.location.href = response.data.url;
          }else{
            alert(response.info);
          }
        },
        error: function(response){
          alert(response.status)
        }
      })
    })
  })
</script>
</html>