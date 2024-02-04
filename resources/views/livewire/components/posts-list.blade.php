<div class="bg-white h-min p-4 dark:bg-gray-800 w-full md:w-2/5 shadow-md rounded-md flex flex-col gap-4">
    @foreach($posts as $post)
        @if($loop->index < $posts_num)
            <a wire:navigate href="{{route('portal.post_page', $post['id'])}}" class="text-sm">
                <span class="text-gray-800 dark:text-gray-100">{{date_ru_format($post['created_at'])}}</span>
                <p class="font-bold">{{$post['title']}}</p>
            </a>
        @endif
    @endforeach
</div>
