<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>School Mana</title>
    
    <link rel="icon" type="image/png" href="{{ asset('assets/i/favicon.png')}}">
    <link rel="apple-touch-icon-precomposed" href="{{ asset('assets/i/app-icon72x72@2x.png')}}">
    <link rel="stylesheet" href="{{ asset('assets/css/amazeui.min.css')}}" />
    <link rel="stylesheet" href="{{ asset('assets/css/admin.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/app.css') }}">
    <script src="{{ asset('assets/js/echarts.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.min.js')}}"></script>
    <script src="{{ asset('assets/js/amazeui.min.js')}}"></script>
    <script src="{{ asset('assets/js/app.js')}}"></script>
</head>

<header class="am-topbar am-topbar-inverse admin-header">
        <div class="am-topbar-brand">
            <a href="{{ url('student/home') }}" class="tpl-logo">
                <img src="{{ asset('assets/img/logo.png')}}" alt="">
            </a>
        </div>
        <div class="am-icon-list tpl-header-nav-hover-ico am-fl am-margin-right">

        </div>

        <button class="am-topbar-btn am-topbar-toggle am-btn am-btn-sm am-btn-success am-show-sm-only" data-am-collapse="{target: '#topbar-collapse'}"><span class="am-sr-only">导航切换</span> <span class="am-icon-bars"></span></button>

        <div class="am-collapse am-topbar-collapse" id="topbar-collapse">

            <ul class="am-nav am-nav-pills am-topbar-nav am-topbar-right admin-header-list tpl-header-list">
               
                <li class="am-hide-sm-only"><a href="javascript:;" id="admin-fullscreen" class="tpl-header-list-link"><span class="am-icon-arrows-alt"></span> <span class="admin-fullText">开启全屏</span></a></li>

                <li class="am-dropdown" data-am-dropdown data-am-dropdown-toggle>
                    <a class="am-dropdown-toggle tpl-header-list-link" href="{{ asset('javascript:;')}}">
                        <span class="tpl-header-list-user-nick">{{ Auth::user()->email }}</span><span class="tpl-header-list-user-ico"> <img src="{{ asset('assets/img/user01.png')}}"></span>
                    </a>
                    <ul class="am-dropdown-content">
                        <li><a href="{{ url('admin/student/form_infor') }}"><span class="am-icon-bell-o"></span> 资料</a></li>
                        <li><a href="#"><span class="am-icon-cog"></span> 设置</a></li>
						<li><a href="{{ url('logout') }}" >
<span class="am-icon-power-off"></span>{{ __(' 退出') }}</a></li>
                    </ul>
                </li>
				<li><a href="{{ route('logout') }}" class="tpl-header-list-link" >
<span class="am-icon-sign-out tpl-header-list-ico-out-size">{{ __('') }}</span></a></li>
            </ul>
        </div>
    </header>
<body>
<div class="tpl-page-container tpl-page-header-fixed">


        <div class="tpl-left-nav tpl-left-nav-hover">
            <div class="tpl-left-nav-title">
                Amaze UI 列表
            </div>
            <div class="tpl-left-nav-list">
                <ul class="tpl-left-nav-menu">
                    <li class="tpl-left-nav-item">
						<a href="{{ url('student/home') }}" class="nav-link active"
						{{ Request::getPathInfo() == 'student/home' ? 'active' : ''}}	
						>
                            <i class="am-icon-home"></i>
                            <span>首页</span>
                        </a>
                    </li>
                    <li class="tpl-left-nav-item">
						<a href="{{ url('admin/student/form_line') }}" class="nav-link tpl-left-nav-link-list"
						{{ Request::getPathInfo() == '/admin/student/form_line' ? 'active' : ''}}
						>
                            <i class="am-icon-bar-chart"></i>
                            <span>数据表</span>
                        </a>
                    </li>

                    <li class="tpl-left-nav-item">
						<a href="{{ url('admin/student/form_infor') }}" class="nav-link tpl-left-nav-link-list"
						{{ Request::getPathInfo() == '/admin/student/form_infor' ? 'active' : ''}}
						>
                            <i class="am-icon-table"></i>
                            <span>资料</span>
						</a>
                    </li>

                    <li class="tpl-left-nav-item">
						<a href="{{ url('admin/student/infor_list') }}" class="nav-link tpl-left-nav-link-list"
						{{ Request::getPathInfo() == '/admin/student/infor_list' ? 'active' : ''}}
						>
                            <i class="am-icon-wpforms"></i>
                            <span>表单</span>

                        </a>
			        </li>

                    <li class="tpl-left-nav-item">
                        <a href="{{ route('logout') }}" class="nav-link tpl-left-nav-link-list">
                            <i class="am-icon-key"></i>
                            <span>退出登录</span>

                        </a>
                    </li>
                </ul>
            </div>
        </div>


    @yield('action')
   
	</html>
