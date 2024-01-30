<a href="{{route('portal.post_page', $post['id'])}}" wire:navigate class="post_card big">
    <div class="img_wrap">
        <img src="{{$post->getFirstMediaUrl('cover')}}" alt="">
        <h2>{{$post['title']}}</h2>
    </div>
    <p class="desc">{{$post['tagline']}}</p>
</a>
