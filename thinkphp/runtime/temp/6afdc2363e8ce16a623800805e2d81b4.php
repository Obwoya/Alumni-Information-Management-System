<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:100:"E:\sigmeta\Documents\GitHub\FirstVersion\thinkphp\public/../application/index\view\index\submit.html";i:1523248055;s:90:"E:\sigmeta\Documents\GitHub\FirstVersion\thinkphp\application\index\view\index\header.html";i:1523199642;s:90:"E:\sigmeta\Documents\GitHub\FirstVersion\thinkphp\application\index\view\index\footer.html";i:1523201959;}*/ ?>
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
    <h2>信息提交</h2>
    <form action="/thinkphp/public/index.php?s=/index/index/submit" method="post">
      姓名: <?php echo $list['姓名']; ?><br>
      学号: <?php echo $list['学号']; ?><br>
      方向: <input type="text" name="方向" value=<?php echo $list['方向']; ?>><br>
      导师: <?php echo $list['导师']; ?><br>
      入学: <?php echo $list['年级（入学）']; ?>年<br>
      籍贯: <input type="text" name="籍贯" value="<?php echo $list['籍贯']; ?>"><br>
      手机: <input type="text" name="手机" value="<?php echo $list['手机']; ?>"><br>
      邮箱: <input type="text" name="邮箱" value="<?php echo $list['邮箱']; ?>"><br>
      省份: <input type="text" name="省份" value="<?php echo $list['省份']; ?>"><br>
      城市: <input type="text" name="城市" value="<?php echo $list['城市']; ?>"><br>
      地址: <input type="text" name="通讯地址" value="<?php echo $list['通讯地址']; ?>"><br>
      行业: <input type="text" name="行业" value="<?php echo $list['行业']; ?>"><br>
      单位: <input type="text" name="现工作单位" value="<?php echo $list['现工作单位']; ?>"><br>
      职务: <input type="text" name="职务" value="<?php echo $list['职务']; ?>"><br>
    <input type="submit" value="提交">
    </form>
  </div>

  <div class="col-1">
  </div>

  <div class="col-2 menu">
    <form action="/thinkphp/public/index.php?s=/index/index/logout" method="post">
      <input type="button" value="您好，<?php echo $username; ?>" onclick="">
      <input value="退出" type="submit">
    </form>
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