<a href="{{route('portal.post_page', $post['id'])}}" wire:navigate class="rounded-md overflow-hidden shadow-md flex flex-col">
    <div class="relative h-64 md:flex-1">
        <img class="absolute bottom-0 w-full h-full object-cover left-0" src="{{$post->getFirstMediaUrl('cover')}}" alt="">
        <div class="absolute bottom-6 text-white left-6 font-bold text-xl sm:text-2xl md:text-3xl mb-2">{{$post['title']}}</div>
    </div>
    <p class="bg-white p-4 dark:text-white dark:bg-gray-800 desc">{{$post['tagline']}}</p>
</a>
