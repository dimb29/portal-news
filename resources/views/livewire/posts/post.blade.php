<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Post
    </h2>
</x-slot>
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-4 py-4">
            <div class="grid gap-4">
                <div class="font-bold text-xl mb-2">{{ $post->title }}</div>
                <div class="flex">
                    by&nbsp;<span class="italic">{{ $post->author->first_name . ' ' . $post->author->last_name }}</span>
                    &nbsp;in&nbsp;<a href="{{ url('dashboard/categories/' . $post->category->id . '/posts') }}"
                        class="underline">{{ $post->category->title }}</a>
                    &nbsp;on&nbsp;{{ $post->updated_at->format('F, d Y') }}
                </div>
                <div class="grid grid-flow-col">
                    @foreach ($post->images as $image)
                        <div class="px-6 py-4">
                            <img src="{{ $image->url }}" alt="{{ $image->description }}" width="80%">
                        </div>
                    @endforeach
                </div>
                <div class="grid grid-flow-col">
                    @foreach ($post->videos as $video)
                        <div class="px-6 py-4">
                            <img src="{{ $video->url }}" alt="{{ $video->title }}" width="300" height="200">
                        </div>
                    @endforeach
                </div>
                <div class="text-gray-700 text-base">
                    {!! $post->content !!}
                </div>
                <div class="flex">
                    @php
                    $tags=$post->tags->pluck('id', 'title');
                    @endphp
                    @if (count($tags) > 0)
                        Tags:
                        @foreach ($tags as $key => $tag)
                            <a href="{{ url('dashboard/tags/' . $tag . '/posts') }}"
                                class="underline px-1">{{ $key }}</a>
                        @endforeach
                    @endif
                </div>
                @if ($post->comments->count())
                    <div class="text-base">
                        <p class="text-gray-900 pt-2 pb-4">{{ $post->comments->count() }}
                        @if ($post->comments->count() > 1) Responses @else Response
                            @endif
                        </p>
                        <div class="bg-gray-100 overflow-hidden shadow-xl px-6 pt-4">
                            @foreach ($post->comments as $comment)
                                <div>
                                    <p class="text-gray-500 font-bold">
                                        {{ $comment->author->first_name . ' ' . $comment->author->last_name }}</p>
                                    <p class="text-gray-400 text-xs">{{ $comment->created_at->format('F, d Y g:i a') }}
                                    </p>
                                    <p class="text-gray-500 pb-4">{{ $comment->comment }}</p>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif

                <form class="w-full max-w-lg">
                    <div class="flex flex-wrap -mx-3 mb-6">
                        <!-- <input id="post_id" type="text" value="wasd" wire:model="comment"> -->
                        <div class="w-full px-3 ">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-comment">
                            Comment
                        </label>
                        <textarea
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            id="comment" wire:model="comment" placeholder="Enter Content">
                        </textarea>
                        @error('content') <span class="text-red-500">{{ $message }}</span>@enderror<!-- <p class="text-red-500 text-xs italic">Please fill out this field.</p> -->
                        <input wire:click.prevent="comment_store()" type="button" class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded" value="Send"> 
                        </div>
                        
                    </div>
                    <div class="flex flex-wrap -mx-3 mb-6">
                        <div class="w-full px-3">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-password">
                            0 Comments
                        </label>
                        <!-- <p class="text-gray-600 text-xs italic">Make it as long and as crazy as you'd like</p> -->
                        </div>
                    </div>
                    </form>

            </div>
        </div>
    </div>
</div>
{{-- https://www.php.net/manual/en/datetime.format.php --}}
