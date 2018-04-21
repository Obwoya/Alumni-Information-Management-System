<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:75:"F:\wamp64\www\thinkphp\public/../application/index\view\index\loadpage.html";i:1524147263;s:63:"F:\wamp64\www\thinkphp\application\index\view\index\header.html";i:1524156004;s:63:"F:\wamp64\www\thinkphp\application\index\view\index\footer.html";i:1524116925;}*/ ?>
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
                    <a class="nav-link" href="#">北京大学软件与微电子学院</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">综合信息服务平台</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">教学论坛</a>
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
                    <a class="nav-link" href="#">
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

<div class="py-5 bg-gradient filter-light">
  <div class="container">
    <div class="row">
      <div class="col-md-3"> </div>
      <div class="col-md-6">
        <div class="card text-white p-5 bg-primary">
          <div class="card-body">
            <h1 class="mb-4">登陆
              <br> </h1>
            <form action="?s=/index/index/login" method="post">
              <div class="form-group">
                <label>学号
                  <br> </label>
                <input type="学号" class="form-control" name="id" placeholder="学号"> </div>
              <div class="form-group">
                <label>密码
                  <br> </label>
                <input type="password" class="form-control" name="password" placeholder="初始密码为八位生日"> </div>
              <button type="submit" class="btn btn-secondary">登陆
                <br> </button>
            </form>
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
