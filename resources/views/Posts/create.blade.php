@extends('layouts.blog_app')

@section('blog_content')


<!-- Three -->
<section id="three" class="wrapper style3 special">
    <div class="container">
        <header class="major">
            <h2>포스팅 작성하기</h2>
        </header>
    </div>
    <div class="container 50%">
        <form action="/blogs" method="post">
            @csrf
            <div class="row uniform">
                <div class="6u 12u$(small)">
                    <input name="title" id="title" value="" placeholder="타이틀" type="text">
                </div>
                
                <div class="12u$">
                    <textarea name="body" id="body" placeholder="내용" rows="6"></textarea>
                </div>
                <div class="12u$">
                    <ul class="actions">
                        <li><input value="저장하기" class="special big" type="submit"></li>
                    </ul>
                </div>
            </div>
        </form>
    </div>
</section>


@endsection
