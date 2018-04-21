<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:102:"E:\sigmeta\Documents\GitHub\FirstVersion\thinkphp\public/../application/index\view\index\loadpage.html";i:1523201094;s:90:"E:\sigmeta\Documents\GitHub\FirstVersion\thinkphp\application\index\view\index\header.html";i:1523199642;s:90:"E:\sigmeta\Documents\GitHub\FirstVersion\thinkphp\application\index\view\index\footer.html";i:1523201959;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="/thinkphp/public/static/css/basecss.css" />
    <script type="text/javascript">

        function validate_required(field,alerttxt)
        {
            with (field)
            {
                if (value==null||value=="")
                {alert(alerttxt);return false}
                else {return true}
            }
        }

        function validate_form(thisform)
        {
            with (thisform)
            {
                if (validate_required(id,"学号不能为空！")==false)
                {id.focus();return false}
            }
        }
    </script>
</head>

<body>

<div class="header">
    <img src="/thinkphp/public/static/image/logo-v1.png">
    <!-- <h1>北京大学软件与微电子学院校友会</h1> -->
</div>
<div class="row">

    <div class="col-2 menu">
        <ul>
            <li><a href="/thinkphp/public/index.php?s=index/index/home">首页</a></li>
            <li>学院新闻</li>
            <li>校友活动</li>
            <li>校友新闻</li>
        </ul>
    </div>
    <div class="col-1">
    </div>


  <div class="col-6 ">
    <form action="?s=/index/index/login" method="post">
    学号: <input type="text" name="id" value=""><br>
    密码: <input type="password" name="password" value="" placeholder="初始密码为生日八位"><br>

    <input type="submit" value="提交">
    </form>
  </div>
  <div class="col-1">
  </div>

    <div class="col-2 menu">
      <ul>
    <li><a href="/thinkphp/public/index.php?s=/index/index/information">个人中心</a></li>
    <li>账户信息</li>
    <li>我的活动</li>
    <li>我的名片</li>
</ul>
</div>

</div>

<div class="bottom">
    <h3>友情链接
        <a href="http://www.ss.pku.edu.cn/">北京大学软件与微电子学院</a>
        <a href="http://www.pku.edu.cn/">北京大学</a>
        <a href="http://www.pku.org.cn/">北京大学校友网</a>
        <a href="http://www.ss.pku.edu.cn/">北京大学软件与微电子学院</a>
    </h3>
</div>
</html>