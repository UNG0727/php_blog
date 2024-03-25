@extends('layouts.blog_app')

@section('blog_content')

<!-- Banner -->
<section id="banner">
    @auth
        <h2>안녕하세요. {{  Auth::user()->name }}</h2>
        <ul class="actions">
            <li>
                <a href="/blogs/create" class="button big">글쓰기</a>
                <a href="/blogs" class="button big">다른글 보기</a>
            </li>
        </ul>
    @else
        <h2>로그인 해주세요.</h2>
        <ul class="actions">
            <li>
                <a href="login" class="button big">로그인</a>
                <a href="register" class="button big">회원가입</a>
            </li>
        </ul>
    @endif
    
</section>


<!-- Footer -->
<footer id="footer">
    <div class="container">
        <div class="row">
            <div class="8u 12u$(medium)">
                <ul class="copyright">
                    <li>&copy; Untitled. All rights reserved.</li>
                    <li>Design: <a href="http://templated.co">TEMPLATED</a></li>
                    <li>Images: <a href="http://unsplash.com">Unsplash</a></li>
                </ul>
            </div>
            <div class="4u$ 12u$(medium)">
                <ul class="icons">
                    <li>
                        <a class="icon rounded fa-facebook"><span class="label">Facebook</span></a>
                    </li>
                    <li>
                        <a class="icon rounded fa-twitter"><span class="label">Twitter</span></a>
                    </li>
                    <li>
                        <a class="icon rounded fa-google-plus"><span class="label">Google+</span></a>
                    </li>
                    <li>
                        <a class="icon rounded fa-linkedin"><span class="label">LinkedIn</span></a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</footer>
@endsection
