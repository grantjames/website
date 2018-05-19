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
<body>
    @if(Request::segment(1) != 'admin')
        <script>
            (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
            (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
            m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
            })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

            ga('create', 'UA-101743966-1', 'auto');
            ga('send', 'pageview');
        </script>
    @endif

    <div class="container">
        <header class="header">
            <h2 class="header__breadcrumb">
                <span><a href="/" class="header__brand">GJ</a></span>
                @if( ! empty($current_category))
                <i class="icon-right-open"></i>
                    <span><a href="/category/{{ $current_category->name }}" class="header__section">{{ ucfirst($current_category->name) }}</a></span>
                @endif
            </h2>
            @if(empty($current_category))
                <p class="header__lead">
                    {!! $categories_string !!}
                </p>
            @endif

            @if(Request::segment(1) == config('app.admin_prefix') && Auth::check())
                <form id="logout-form" action="{{ route('logout') }}" method="POST">
                     {{ csrf_field() }}
                </form>

                <ul class="admin-list">
                    <li><a href="{{ route('admin.posts.index') }}" class="">Posts</a></li>
                    <li><a href="{{ route('admin.categories.index') }}" class="">Categories</a></li>
                    <li><a href="{{ route('admin.tags.index') }}" class="">Tags</a></li>
                    <li>|</li>
                    <li><a href="/logout" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a></li>
                </ul>
            @endif
        </header>

    
        <div style="color: green">
            @if(Session::has('message'))
                {{ Session::get('message') }}
            @endif
        </div>

        <div style="color: red">
            @if($errors->any())
                @foreach($errors->all() as $error)
                    {{ $error }}<br>
                @endforeach
            @endif
        </div>

        @yield('content')
    </div>

    <footer class="footer">
        <div class="container">
            <ul class="footer__icons">
                <li>
                    <a href="/about">
                        <i class="icon-user-o"></i>
                    </a>
                </li>
                <li>
                    <a href="https://twitter.com/gjames_dev" target="_blank">
                        <i class="icon-twitter"></i>
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
</body>
</html>