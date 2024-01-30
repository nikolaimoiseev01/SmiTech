<x-portal-layout>
    <div class="page_main_wrap">

        <div class="welcome_wrap">
            <livewire:components.post-card-big :post="$post_big"></livewire:components.post-card-big>
            <div class="news_list_wrap">

                @foreach($posts_list as $post)
                    <div class="new_wrap">
                        <span>{{$post['created_at']}}</span>
                        <p><b>{{$post['tagline']}}</b></p>
                    </div>
                @endforeach


            </div>
        </div>

        <livewire:components.post-feed></livewire:components.post-feed>

    </div>
</x-portal-layout>
