<x-portal-layout>
    <div class="page_main_wrap">
        <div class="md:flex-row flex-col flex gap-6 mb-8">
            <livewire:components.post-card-big :post="$post_big"></livewire:components.post-card-big>
            <livewire:components.posts-list posts_num="4" :posts="$posts_list"></livewire:components.posts-list>
        </div>

        <livewire:components.post-feed :posts="$posts"></livewire:components.post-feed>
    </div>
</x-portal-layout>
