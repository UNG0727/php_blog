@extends('layouts.blog_app')

@section('blog_content')

<!-- Two -->
<section id="two" class="wrapper style2 special">
    <div class="container">

        @foreach ($postList as $post)
        <header class="major">
            <h2><a href="/blogs/{{ $post->id }}">{{ $post -> title }}</a></h2>
            <p>{{ $post -> body }}</p>
        </header>
        @endforeach
        
    </div>
    {{ $postList->links() }}
</section>

@endsection
