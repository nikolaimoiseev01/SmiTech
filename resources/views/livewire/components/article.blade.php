<article class="w-full md:w-3/5 flex flex-col gap-4">
    <img
        src="{{$post->getFirstMediaUrl('cover')}}"
        alt=""
        class="h-64"
        id="postImage"
    >

    <div class="flex justify-between">
        <div class="p-2 border-2 rounded">{{date_ru_format($post['created_at'])}}</div>
    </div>
    <div class="text-3xl font-bold"> {{$post['title']}}</div>
    {!! $post['body'] !!}

</article>
