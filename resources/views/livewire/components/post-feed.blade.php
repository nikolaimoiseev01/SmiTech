<div>
    <section class="flex gap-8">
        @foreach($posts as $post)
            <livewire:components.post-card-small :post="$post"></livewire:components.post-card-small>
        @endforeach
    </section>

</div>
