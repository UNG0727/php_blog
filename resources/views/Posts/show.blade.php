@extends('layouts.blog_app')

@section('blog_content')

<!-- Two -->
<section id="two" class="wrapper style2 special">
    <div class="container">

        <header class="major">
            <h2>제목: {{ $post -> title }}</h2>
            <p>내용: {{ $post -> body }}</p>
            <div>
                @if ($post->user != null)
                    <p>작성자: {{ $post->user->name }}</p>
                @endif
                    <p>작성일: {{ $post -> created_at -> diffForHumans() }}</p>
                    @php
                        $isLiked = false;
                    @endphp
                    @foreach ($post->likes as $like )
                        {{-- <h3>{{ $like->user->id }}</h3> --}}
                        @if(auth()->id()== $like->user->id)
                        @php
                            $isLiked = true;
                        @endphp
                        @endif
                    @endforeach
                    @if($isLiked == true)
                        {{-- 좋아요 버튼 --}}
                        <form method="post" action="/post/{{ $post->id }}/like">
                            @csrf
                            <button type="submit">unLike</button>
                            <p><i class="fas fa-thumbs-up" style="color: blue"></i></p>
                        </form>
                    @else
                        {{-- 좋아요 버튼 --}}
                        <form method="post" action="/post/{{ $post->id }}/like">
                            @csrf
                            <button type="submit">Like</button>
                            <p><i class="fas fa-thumbs-up" style="color: blue"></i></p>
                        </form>
                    @endif
                    <p>좋아요: {{ count($post->likes) }}</p>
            </div>
            <div class="12u$">
                <ul class="actions">
                    @if(Auth::user()->id == $post->user->id)
                        <a href="/blogs/{{ $post->id }}/edit"><input value="수정하기" class="special big" type="submit"></a>
                        <a href="/blogs/{{ $post->id }}/delete"><input value="삭제하기" class="special big" type="submit"></a>
                    @endif
                </ul>
                {{-- <ul class="actions">
                    <a href="/blogs/{{ $post->id }}/delete"><input value="삭제하기" class="special big" type="submit"></a>
                </ul> --}}
                <form action="/blogs/{{ $post->id }}" method="post">
                    @csrf
                    @method('DELETE')
                    <li><input value="삭제" class="special big" type="submit"></li>
                </form>
            </div>
        </header>

        <div class="input-group mb-3">
            
            {{-- <form method="post" action="{{ route('comment.add') }}"> --}}
            <form method="post" action="/comment">
                @csrf
                <input type="text" class="form-control" name='body' placeholder="댓글달기" aria-label="Recipient's username" aria-describedby="button-addon2">
                <input type='hidden' name="post_id" value="{{ $post->id }}"/>
                <input type="hidden" name="parent_id" value="0"/>
                <button class="btn btn-outline-secondary" type="submit" id="button-addon2">등록</button>
            </form>
        </div>
        <div class="card-body">
            <h5>댓글 목록</h5>
            <hr>
            {{-- {{ dd($post->comments) }} --}}
            @foreach($post->comments as $commentItem)
                <div class="d-flex bd-highlight mb-3">
                    <ul>
                        <div class="likeBtn"><strong>{{ $commentItem->user->name }}</strong></div>
                        <div class="ml-auto bd-highlight"><p>{{ $commentItem->created_at->diffForHumans() }}</p></div>
                    </ul>
                </div>
                <div>
                    <p>{{ $commentItem->body }}</p>
                </div>
                <hr>
            @endforeach
        </div>
    </div>
</section>
<script>
 function likeBtnClicked() {
    console.log("좋아요 클릭");
    
}

 $(function() {
    $('.toggle-class').change(function() {

    })
 })
</script>

@endsection
