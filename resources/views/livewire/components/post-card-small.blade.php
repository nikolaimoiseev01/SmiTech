<a href="{{route('portal.post_page', $post['id'])}}" class="post_card small" wire:navigate>
    <div class="img_wrap">
        <img src="{{$post->getFirstMediaUrl('cover')}}" alt=""/>
        <span>{{$post->topic['title']}}</span>
    </div>

    <div class="text_wrap">
        <h3 class="title">{{$post['title']}}</h3>
    </div>
</a>
