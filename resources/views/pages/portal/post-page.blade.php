<x-portal-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{$post['title']}}
        </h2>
    </x-slot>
{{--    <img class="h-16" src="{{$post->getFirstMediaUrl('cover')}}" alt="">--}}
    {!! $post['body'] !!}
</x-portal-layout>
