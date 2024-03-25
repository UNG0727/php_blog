<!DOCTYPE html>
<!--
	Transit by TEMPLATED
	templated.co @templatedco
	Released for free under the Creative Commons Attribution 3.0 license (templated.co/license)
-->
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Transit by TEMPLATED</title>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<!--[if lte IE 8]><script src="js/html5shiv.js"></script><![endif]-->
		<script src="js/jquery.min.js"></script>
		<script src="js/skel.min.js"></script>
		<script src="js/skel-layers.min.js"></script>
		<script src="js/init.js"></script>
		{{-- <noscript> --}}
            <link rel="stylesheet" href="css/font-awesome.min.css"/>
            <link rel="stylesheet" href="css/skel.css"/>
            <link rel="stylesheet" href="css/style-xlarge.css"/>
            <link rel="stylesheet" href="css/style.css"/>
			{{-- <link rel="stylesheet" href="css/skel.css" />
			<link rel="stylesheet" href="css/style.css" />
			<link rel="stylesheet" href="css/style-xlarge.css" /> --}}
		{{-- </noscript> --}}
	</head>
	<body class="landing">
        <!-- Header -->
        <header id="header">
            <h1><a href="/">simpleBlog</a></h1>
            <nav id="nav">
                <ul>
					@auth
						@if (Request::path() !== 'blogs')
							<li><a href="/blogs" style="color: black">다른글 보기</a></li>
						@elseif (Request::path() !== 'blogs/create')
							<li><a href="/blogs/create" style="color: black">글쓰기</a></li>
						@endif()
						<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
							@csrf
							<input value="로그아웃" type="submit"/>
						</form>
					@else
						<input value="로그인" type="button" onclick="location.href='/login'"/>
						<input value="회원가입" type="button" onclick="location.href='/register'"/>
					@endif
                </ul>
            </nav>
        </header>

        @yield('blog_content')
	</body>
</html>