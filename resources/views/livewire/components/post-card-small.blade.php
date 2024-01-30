<a href="{{route('portal.post_page', $post['id'])}}" class="post_card small" wire:navigate>
    <img src="{{$post->getFirstMediaUrl('cover')}}" alt=""/>
    <div class="text_wrap">
        <h3 class="title">{{$post['title']}}</h3>
        <p class="desc">{{$post['tagline']}}</p>
    </div>
</a>
