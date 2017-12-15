<aside id="sidebar">
    <section class="categories">
        <h3 class="aside-title"><i class="iconfont icon-folder-open-o"></i> Categories</h3>
        @foreach($categories as $id=>$value)
            <a class="tag" href="/cate/{{$id}}" title="{{$value['name']}}">{{$value['name']}}</a>
        @endforeach
    </section>
    <section class="tags">
        <h3 class="aside-title"><i class="iconfont icon-tags"></i>Tags</h3>
        @foreach($tags as $id=>$value)
            <a class="tag" href="/tag/{{$id}}" title="{{$value['name']}}">{{$value['name']}}</a>
        @endforeach
    </section>
    <section class="friends">
        <h3 class="aside-title"><i class="iconfont icon-group"></i> Friendly Link</h3>
        @foreach(config('custom.FriendlyLink',[]) as $value)
            <a class="tag" href="{{$value['link']}}" title="{{$value['title']}}" target="_blank">{{$value['name']}}</a>
        @endforeach
    </section>
</aside>