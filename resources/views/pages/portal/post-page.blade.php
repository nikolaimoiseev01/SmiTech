<x-portal-layout>
    <div class="flex gap-8 justify-between">
        <livewire:components.article :post="$post"></livewire:components.article>
        <livewire:components.posts-list :posts="$posts_list"></livewire:components.posts-list>
    </div>

</x-portal-layout>
