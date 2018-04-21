<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:78:"F:\wamp64\www\thinkphp\public/../application/index\view\index\information.html";i:1524157296;s:63:"F:\wamp64\www\thinkphp\application\index\view\index\header.html";i:1524157951;s:63:"F:\wamp64\www\thinkphp\application\index\view\index\footer.html";i:1524116925;}*/ ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="/thinkphp/public/static/css/theme.css" type="text/css"> </head>

<body>
<nav class="navbar navbar-expand-md navbar-dark text-right text-lowercase border-primary bg-dark">
    <div class="container">
        <a class="navbar-brand" href="/thinkphp/public/">首页</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="http://www.ss.pku.edu.cn/">北京大学软件与微电子学院</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="https://icampus.ss.pku.edu.cn/">综合信息服务平台</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="http://bbs.ss.pku.edu.cn/">教学论坛</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">内推入口</a>
                </li>
            </ul>
            <form class="form-inline m-0 p-0">
                <input class="form-control mr-2" type="text" placeholder="Search">
                <button class="btn btn-primary" type="submit">Search</button>
            </form>
        </div>
    </div>
</nav>
<nav class="navbar navbar-expand-md navbar-dark bg-headblue bg-secondary">
    <a class="navbar-brand" href="#">
        <img src="/thinkphp/public/static/image/logo_1.png" width="500" class="d-inline-block align-top ml-auto p-0" alt=""> </a>
    <div class="container">
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbar2SupportedContent" aria-controls="navbar2SupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse text-center justify-content-end" id="navbar2SupportedContent">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="http://www.pku.edu.cn/campuslife/xl/index.htm">
                        <i class="fa d-inline fa-lg fa-bookmark-o"></i>校历</a>
                </li>
            </ul>
            <a class="btn navbar-btn ml-2 btn-secondary" href="/thinkphp/public"><?php echo \think\Session::get('name')?\think\Session::get('name'):"登录"; ?></a>
            <a class="btn navbar-btn ml-2 btn-secondary" href="/thinkphp/public/index/index/logout">退出</a>
        </div>
    </div>
</nav>
<nav class="navbar navbar-expand-md bg-primary navbar-dark">
    <div class="container">
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbar3SupportedContent" aria-controls="navbar3SupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse text-center justify-content-left" id="navbar3SupportedContent">
            <ul class="navbar-nav">
                <li class="nav-item text-warning">
                    <a class="nav-link" href="/thinkphp/public/index/index/info">个人中心</a>
                </li>
                <li class="nav-item text-dark">
                    <a class="nav-link" href="/thinkphp/public/index/index/dongtai">学院动态</a>
                </li>
                <li class="nav-item text-dark">
                    <a class="nav-link" href="/thinkphp/public/index/index/huodong">校友活动</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<div class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-4">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-6">
                                        <img class="d-block img-fluid img-thumbnail" src="/thinkphp/public/static/image/头像_1.JPEG"> </div>
                                    <div class="col-md-6">
                                        <div class="row"><br><br></div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <a class="btn btn-primary text-danger" href="#">修改登陆密码</a>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12"><br><br></div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <a class="btn btn-secondary" href="/thinkphp/public/index/index/changeinfo">修改个人信息</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header"><?php echo $list['姓名']; ?> <?php echo $list['学号']; ?></div>
                            <div class="card-body">
                                <h6>方向: <?php echo $list['方向']; ?></h6>
                                <h6>导师: <?php echo $list['导师']; ?></h6>
                                <h6>入学: <?php echo $list['年级（入学）']; ?>年</h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8 ">
                        <div class="card">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">方向: <?php echo $list['方向']; ?></li>
                                <li class="list-group-item">籍贯: <?php echo $list['籍贯']; ?><br></li>
                                <li class="list-group-item">手机: <?php echo $list['手机']; ?></li>
                                <li class="list-group-item">邮箱: <?php echo $list['邮箱']; ?></li>
                                <li class="list-group-item">省份: <?php echo $list['省份']; ?></li>
                                <li class="list-group-item">城市: <?php echo $list['城市']; ?></li>
                                <li class="list-group-item">地址: <?php echo $list['通讯地址']; ?></li>
                                <li class="list-group-item">行业: <?php echo $list['行业']; ?></li>
                                <li class="list-group-item">单位: <?php echo $list['现工作单位']; ?></li>
                                <li class="list-group-item">职务: <?php echo $list['职务']; ?></li>
                            </ul>
                            <!--div class="card-body">
                                <a href="#" class="card-link">修改个人信息</a>
                                <a href="#" class="card-link">修改头像</a>
                            </div-->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="text-white bg-primary">
    <div class="container">
        <div class="row">
            <div class="p-4 col-md-3">
                <h4 class="mb-4">软微校友会</h4>
                <p class="text-white">服务学院一万余名毕业生</p>
            </div>
            <div class="p-4 col-md-3">
                <h3 class="mb-4">网站地图</h3>
                <ul class="list-unstyled">
                    <a href="#" class="text-white">主页</a>
                    <br>
                    <a href="#" class="text-white">关于我们</a>
                    <br>
                    <a href="#" class="text-white">我们的服务</a>
                    <br>
                    <a href="#" class="text-white">故事</a>
                </ul>
            </div>
            <div class="p-4 col-md-3">
                <h3 class="mb-4">联系我们</h3>
                <p>
                    <a href="tel:+246 - 542 550 5462" class="text-white">
                        <i class="fa d-inline mr-3 text-secondary fa-phone"></i>+86 - 010 6127 0000</a>
                </p>
                <p>
                    <a href="mailto:info@pingendo.com" class="text-white">
                        <i class="fa d-inline mr-3 text-secondary fa-envelope-o"></i>123@ss.pku.cn</a>
                </p>
                <p>
                    <a href="https://goo.gl/maps/AUq7b9W7yYJ2" class="text-white" target="_blank">
                        <i class="fa d-inline mr-3 fa-map-marker text-secondary"></i>北京，金苑路24号</a>
                </p>
            </div>
            <div class="p-4 col-md-3">
                <h3 class="mb-4 text-light">提交个人信息</h3>
                <form>
                    <fieldset class="form-group text-white">
                        <label for="exampleInputEmail1">提交你的邮箱</label>
                        <input type="email" class="form-control" placeholder="Enter email"> </fieldset>
                    <button type="submit" class="btn btn-outline-secondary">提交</button>
                </form>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 mt-3">
                <p class="text-center text-white">© Copyright 2018 北京大学软件与微电子学院.</p>
            </div>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>
