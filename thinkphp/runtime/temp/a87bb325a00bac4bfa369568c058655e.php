<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:105:"E:\sigmeta\Documents\GitHub\FirstVersion\thinkphp\public/../application/index\view\index\homepagesuc.html";i:1523201094;s:90:"E:\sigmeta\Documents\GitHub\FirstVersion\thinkphp\application\index\view\index\header.html";i:1523199642;s:90:"E:\sigmeta\Documents\GitHub\FirstVersion\thinkphp\application\index\view\index\footer.html";i:1523201959;}*/ ?>
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
    <h2>开启机器学习课程中的MOOC教学</h2>
    <p>&nbsp;&nbsp;&nbsp;&nbsp;经机器学习课程组织人蒋严冰老师邀请，微软中国公司的教育行业技术总监周轶老师做客机器学习的课堂，为同学们带来了微软关于机器学习与MOOC教育的简短报告，并开启了机器学习课程中的MOOC教学。
       周轶总监首先介绍了微软在新型软件开发技术与人工智能等领域的MOOC课程和认证体系，然后结合精彩案例讲述了微软在AI领域最新的技术和实践。周轶总监介绍，近年来为适应业界对最新软件实现技术和人工智能领域的需要，微软内部杰出技术人员，联合世界著名高校学者，开发并发布了一系列MOOC课程，内容涵盖了云计算、大数据、人工智能、机器学习、虚拟及混合现实、移动互联网、物联网等最新IT技术，每门课程除了具有完整的教学视频，还提供实验环境供选课学生实操和实验。随后，周轶总监通过几个精彩的案例，介绍了微软人工智能领域的最新技术与产品，它们在帮助残障人士、寻找失散儿童、智慧教育转变等方面取得了良好的社会效益。他并鼓励同学们克服困难，学好机器学习，实现自我价值。在本次课程中，微软公司为同学们提供了MOOC资源和云端实验环境，并邀请微软该领域的专家来课堂做报告或指导实验。课程将继续探索传统授课与MOOC课程相结合的新型教学方式。
     </p>
     <h2>开启机器学习课程中的MOOC教学</h2>
     <p>&nbsp;&nbsp;&nbsp;&nbsp;经机器学习课程组织人蒋严冰老师邀请，微软中国公司的教育行业技术总监周轶老师做客机器学习的课堂，为同学们带来了微软关于机器学习与MOOC教育的简短报告，并开启了机器学习课程中的MOOC教学。
        周轶总监首先介绍了微软在新型软件开发技术与人工智能等领域的MOOC课程和认证体系
     </p>
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