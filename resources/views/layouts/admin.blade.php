<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>后台管理{{isset($title) ? $title : ''}}</title>

    <link rel="stylesheet" type="text/css" href="//apps.bdimg.com/libs/bootstrap/3.3.4/css/bootstrap.min.css"/>
    <link rel="stylesheet" type="text/css" href="{{asset('assets/font-awesome/css/font-awesome.min.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/local.css')}}"/>

    <script type="text/javascript" src="//apps.bdimg.com/libs/jquery/2.1.4/jquery.min.js"></script>
    <script type="text/javascript" src="//apps.bdimg.com/libs/bootstrap/3.3.4/js/bootstrap.min.js"></script>

    <!-- you need to include the shieldui css and js assets in order for the charts to work -->

    <link rel="stylesheet" type="text/css"
          href="{{asset('assets/components/latest/css/light-bootstrap/all.min.css')}}"/>
    <script type="text/javascript" src="{{asset('assets/components/latest/js/shieldui-all.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/js/gridData.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/js/echarts.min.js')}}"></script>

</head>

<body>
<div id="wrapper">

    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">

        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{route('home')}}">管理面板</a>
        </div>
        <div class="collapse navbar-collapse navbar-ex1-collapse">

            <ul class="nav navbar-nav side-nav">
                <li {{ $page =='index' ? 'class=active' : ''}}><a href="{{route('home')}}"><i class="fa fa-bullseye"></i> 主页</a></li>
                <li {{ $page =='portfolio' ? 'class=active' : ''}}><a href="{{route('portfolio')}}"><i class="fa fa-tasks"></i> 个人信息</a></li>
                <li {{ $page =='blog' ? 'class=active' : ''}}><a href="{{route('blog')}}"><i class="fa fa-globe"></i> 文章</a></li>
                <li {{ $page =='forms' ? 'class=active' : ''}}><a href="{{route('forms')}}"><i class="fa fa-list-ol"></i> 表单</a></li>
                <li {{ $page =='typography' ? 'class=active' : ''}}><a href="{{route('typography')}}"><i class="fa fa-font"></i> 字体展示</a></li>
                <li {{ $page =='bootstrapElements' ? 'class=active' : ''}}><a href="{{route('bootstrapElements')}}"><i class="fa fa-list-ul"></i> Bootstrap 的样式</a></li>
                <li {{ $page =='bootstrapGrid' ? 'class=active' : ''}}><a href="{{route('bootstrapGrid')}}"><i class="fa fa-table"></i> Bootstrap 栅格系统</a></li>
            </ul>

            <ul class="nav navbar-nav navbar-right navbar-user">
                <li class="dropdown messages-dropdown">
                    <a href="index.html#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-envelope"></i>
                        消息 <span class="badge">2</span> <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li class="dropdown-header">2 条消息</li>
                        <li class="message-preview">
                            <a href="#">
                                <span class="avatar"><i class="fa fa-bell"></i></span>
                                <span class="message">Security alert</span>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li class="message-preview">
                            <a href="#">
                                <span class="avatar"><i class="fa fa-bell"></i></span>
                                <span class="message">Security alert</span>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="#">Go to Inbox <span class="badge">2</span></a></li>
                    </ul>
                </li>
                <li class="dropdown user-dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> {{ Auth::user()->user }}<b
                                class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a href="#"><i class="fa fa-user"></i> 个人信息</a></li>
                        <li><a href="#"><i class="fa fa-gear"></i> 设置</a></li>
                        <li class="divider"></li>
                        <li>
                            <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"><i class="fa fa-power-off"></i> 退出</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>

    @yield('content')

</div>
</body>
@yield('script')
</html>