<!DOCTYPE html>
<html lang="en">
<head>
  <link rel="stylesheet" href="{{ URL::asset('css/bootstrap.css') }}">
  <link rel="stylesheet" href="{{ URL::asset('css/style.css') }}">
  <link rel="stylesheet" href="{{ URL::asset('css/public.css') }}">
  <script type="text/javascript" src="{{ URL::asset('js/app.js') }}"></script>
</head>
<body>
<div class="login">
    <div class="logo-top wb100 d-ib">
        <div class="logo1 pull-left"><img src="{{ URL::asset('images/logo.png') }}"> </div>
        <div class="logo-right pull-right"><a href="#">关于我们</a>|<a href="#">联系我们</a> |<a href="#">帮助中心</a> </div>
    </div>
    <section class="login-bj">
        <form class="form-horizontal" action="{{ url('login') }}" role="form" method="post">
           @csrf
            <div class="login-dl pull-right">
                <ul class="ul-login">
                    <li><span>用户名：</span><input id="username" name="username" placeholder="用户名" class="form-control w240" value="" type="text"></li>
                    <li><span>密　码：</span><input id="password" name="password" placeholder="密码" class="form-control w240" value="" type="password"></li>
                    <li><span></span>
                        <input type="submit" class="btn btn-login mr40" value="登录"/>
                        <input type="button" onclick="top.location.href='{:U('Login/updatepwd')}'" class="btn btn-reset" value="重置密码"/>
                    </li>
                </ul>
                <!-- 错误提示 -->
                  <div>
                  @if ($errors->any())

                    @foreach ($errors->all() as $error)
                      <p class="check-tips text-danger col-sm-offset-3 col-sm-7">
                        {{ $error }}
                      </p>
                    @endforeach

                  @endif

                </div>
            </div>
        </form>
    </section>
    <footer class="text-center mt20">
        <p>©Copyright 2017-2018 大连石油化工研究院 版权所有</p>
    </footer>
</div>
</body>
</html>
