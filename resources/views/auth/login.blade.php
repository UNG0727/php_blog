@extends('layouts.blog_app')

@section('blog_content')


<!-- Three -->
<section id="three" class="wrapper style3 special">
    <div class="container">
        <header class="major">
            <h2>로그인 하기</h2>
        </header>
    </div>
    <div class="container 50%">
        <form action="/login" method="POST">
            @csrf
            <div class="row uniform">
                <div class="6u 12u$(small)">
                    <label for="email" class="col-md-4 col-form-label text-md-end">이메일</label>
                    <input name="email" id="email" value="" placeholder="이메일" type="email">
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                </div>

                <div class="6u 12u$(small)">
                    <label for="password" class="col-md-4 col-form-label text-md-end">패스워드</label>
                    <input name="password" id="password" value="" placeholder="패스워드" type="password">
                </div>
                
                <div class="12u$">
                    <ul class="actions">
                        <li><input value="로그인하기" class="special big" type="submit"></li>
                    </ul>
                </div>
            </div>
        </form>
    </div>
</section>


@endsection
