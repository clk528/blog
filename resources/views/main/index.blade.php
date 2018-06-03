@extends('layouts.blog.blog')
@section('content')
    <main id="main" class="home">
        @if( $page->total() > 0)
            @foreach($page as $value)
                <article class="post">
                    <header class="post-head"><h2 class="post-title">
                            <a href="{{route('main.detail',['id'=>$value->id])}}">{{$value->title}}</a>
                        </h2>
                        <time datetime="{{$value->created->diffForHumans()}}" class="post-time">{{$value->created->diffForHumans()}}</time>
                    </header>
                    <section class="post-excerpt">
                        <p>{{$value->subtitle}}</p>
                    </section>
                </article>
            @endforeach
            {!! $page->links('pagination.bootstrap-4') !!}
        @else
            <div style="margin-top: 100px;">
                <i class="material-icons md-70">呜呜呜呜</i>
                <p>现在还没有文章呢</p>
            </div>
        @endif
    </main>
    @include('layouts.blog.sidebar')
@endsection