<x-portal-layout>
    <div class="page_main_wrap">
        <div class="md:flex-row flex-col flex gap-6 mb-8">
            @if($post_big ?? null)
                <livewire:components.post-card-big :post="$post_big"></livewire:components.post-card-big>
            @endif
            @if($posts_list ?? null)
                <livewire:components.posts-list posts_num="4" :posts="$posts_list"></livewire:components.posts-list>
            @endif
        </div>
        @if($posts ?? null)
            <livewire:components.post-feed :posts="$posts"></livewire:components.post-feed>
        @endif
    </div>
</x-portal-layout>
