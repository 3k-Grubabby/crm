
<!doctype html>

<html>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title></title>
    <script src=" {{ URL::asset('js/boot.js') }}" type="text/javascript"></script>
    <link href="{{ URL::asset('css/mCustomScrollbar.css') }}" rel="stylesheet" type="text/css" />
    <script src="{{ URL::asset('js/mCustomScrollbar.concat.min.js') }}" type="text/javascript"></script>
    <link href="{{ URL::asset('css/menu.css') }}" rel="stylesheet" type="text/css" />
    <script src="{{ URL::asset('js/menu.js') }}" type="text/javascript"></script>
    <script src="{{ URL::asset('js/menutip.js') }}" type="text/javascript"></script>
    <link href="{{ URL::asset('css/tabs.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ URL::asset('css/frame.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ URL::asset('css/index.css') }}" rel="stylesheet" type="text/css" />

</head>
<body>

<div class="navbar">
    <div class="navbar-header">
        <div class="navbar-brand">MiniUI</div>
        <div class="navbar-brand navbar-brand-compact">M</div>
    </div>
    <ul class="nav navbar-nav">
        <li><a id="toggle"><span class="fa fa-bars" ></span></a></li>
        <li class="icontop"><a href="#"><i class="fa fa-hand-pointer-o"></i><span >系统演示</span></a></li>
        <li class="icontop"><a href="#"><i class="fa fa-puzzle-piece"></i><span >开发文档</span></a></li>
        <li class="icontop"><a href="#"><i class="fa fa-sort-amount-asc"></i><span >人力资源</span></a></li>
        <li class="icontop"><a href="#"><i class="fa  fa-cog"></i><span >系统设置</span></a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
        <li ><a href="#"><i class="fa fa-paper-plane"></i> 代办事项</a></li>
        <li><a href="#"><i class="fa fa-pencil-square-o"></i> 修改密码</a></li>
        <li class="dropdown">
            <a class="dropdown-toggle userinfo">
                <img class="user-img" src="res/images/user.jpg" />个人资料<i class="fa fa-angle-down"></i>
            </a>
            <ul class="dropdown-menu pull-right">
                <li ><a href="#"><i class="fa fa-eye "></i> 用户信息</a></li>
                <li><a href="#"><i class="fa fa-user"></i> 退出登录</a></li>
            </ul>
        </li>
    </ul>
</div>

<div class="container">

    <div class="sidebar">
        <div class="sidebar-toggle"><i class = "fa fa-fw fa-dedent" ></i></div>
        <div id="mainMenu"></div>
    </div>

    <div class="main">
        <div id="mainTabs" class="mini-tabs main-tabs" activeIndex="0" style="height:100%;" plain="false"
             buttons="#tabsButtons" arrowPosition="side" >
            <div name="index" iconCls="fa-android" title="控制台">
                MiniUI导航框架
            </div>
        </div>
        <div id="tabsButtons">
            <a class="tabsBtn"><i class="fa fa-home"></i></a>
            <a class="tabsBtn"><i class="fa fa-refresh"></i></a>
            <a class="tabsBtn"><i class="fa fa-remove"></i></a>
            <a class="tabsBtn"><i class="fa fa-arrows-alt"></i></a>
        </div>
    </div>

</div>


</body>
</html>
<script>

    function activeTab(item) {
        var tabs = mini.get("mainTabs");
        var tab = tabs.getTab(item.id);
        if (!tab) {
            tab = { name: item.id, title: item.text, url: item.url, iconCls: item.iconCls, showCloseButton: true };
            tab = tabs.addTab(tab);
        }
        tabs.activeTab(tab);
    }

    $(function () {

        //menu
        var menu = new Menu("#mainMenu", {
            itemclick: function (item) {
                if (!item.children) {
                    activeTab(item);
                }
            }
        });

        $(".sidebar").mCustomScrollbar({ autoHideScrollbar: true });

        new MenuTip(menu);

        $.ajax({
            url: "{{ URL::asset('/menu') }}",
            success: function (text) {
                var data = mini.decode(text);
                menu.loadData(data);
            }
        })

        //toggle
        $("#toggle, .sidebar-toggle").click(function () {
            $('body').toggleClass('compact');
            mini.layout();
        });

        //dropdown
        $(".dropdown-toggle").click(function (event) {

            $(this).parent().addClass("open");
            return false;
        });

        $(document).click(function (event) {
            $(".dropdown").removeClass("open");
        });
    });

</script>
