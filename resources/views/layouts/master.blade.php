<!DOCTYPE html>
<html>
<head>
    <title>Grant James</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="/css/app.css">

    @include('partials.category_styles')
</head>
<body class="{{ $theme . '-theme' }}">
    @if(Request::segment(1) != 'admin')
        <script async src="https://www.googletagmanager.com/gtag/js?id=UA-141186556-1"></script>
        <script>
            window.dataLayer = window.dataLayer || [];
            function gtag(){dataLayer.push(arguments);}
            gtag('js', new Date());

            gtag('config', 'UA-141186556-1');
        </script>
    @endif

    <header class="header">
        <div class="main-container">
            <h2 class="header__breadcrumb">
                <span><a href="/" class="header__brand">GJ</a></span>
                @if( ! empty($current_category))
                    <i class="icon-right-open"></i>
                    <div style="display: inline-block;">
                        <a href="/category/{{ $current_category->name }}" class="header__section">{{ ucfirst($current_category->name) }}</a>
                        <div id="header__dropdown" class="header__dropdown">
                            <div class="arrow"></div>
                        </div>
                        <div id="quick-category-switcher">
                            @foreach($categories as $category)
                                @if($category->id != $current_category->id)
                                    <a href="/category/{{ $category->name }}" style="color: {{ $category->colour }}">
                                        {{ ucfirst($category->name) }}
                                    </a>
                                @endif
                            @endforeach
                        </div>
                    </div>
                @endif
            </h2>

            <i id="theme-toggle" class="icon-{{ $theme == 'dark' ? 'sun-1' : 'moon' }}"></i>

            @if(Request::segment(1) == config('app.admin_prefix') && Auth::check())
                <div class="header__lead">
                    <form id="logout-form" action="{{ route('logout') }}" method="POST">
                        {{ csrf_field() }}
                    </form>

                    <ul class="admin-menu">
                        <li><a href="{{ route('admin.posts.index') }}" class="">Posts</a></li>
                        <li>|</li>
                        <li><a href="{{ route('admin.categories.index') }}" class="">Categories</a></li>
                        <li class="admin-menu__logout"><a href="/logout" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a></li>
                    </ul>
                </div>
            @elseif (empty($current_category))
                <p class="header__lead">
                    {!! $categories_string !!}
                </p>
            @endif
        </div>
    </header>
    
    <div class="main-container">
        @if(Session::has('message'))
            <div style="color: green">
                {{ Session::get('message') }}
            </div>
        @endif

        @if($errors->any())
            <div style="color: red">
                @foreach($errors->all() as $error)
                    {{ $error }}<br>
                @endforeach
            </div>
        @endif
        
        @yield('content')
    </div>

    <footer class="footer">
        <div class="main-container">
            <ul class="footer__icons">
                <li>
                    <a href="/about">
                        <i class="icon-user-o"></i>
                    </a>
                </li>
                <li>
                    <a href="https://github.com/grantjames" target="_blank">
                        <i class="icon-github-circled"></i>
                    </a>
                </li>
                <li>
                    <a href="http://uk.linkedin.com/pub/grant-james/58/210/766" target="_blank">
                        <i class="icon-linkedin-squared"></i>
                    </a>
                </li>
            </ul>
            
            <p class="footer__built-with">
                Built with the <a href="http://www.laravel.com" target="_blank">Laravel</a> framework and hosted on <a href="http://www.digitalocean.com/?refcode=9eec9115a94a" target="_blank">DigitalOcean</a>
            </p>
        </div>
        
    </footer>
    
    @yield('scripts')
    <script src="/js/app.js"></script>
</body>
</html>