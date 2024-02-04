<a wire:navigate href="{{route('portal.post_page', $post['id'])}}"
   class="bg-white rounded-md overflow-hidden shadow-md dark:bg-gray-800">
    <img class="h-40 object-cover w-full" src="{{$post->getFirstMediaUrl('cover')}}" alt="Sunset in the mountains">
    <div class="px-6 py-4">
        <div class="font-bold text-xl mb-2">{{$post['title']}}</div>
    </div>
</a>
