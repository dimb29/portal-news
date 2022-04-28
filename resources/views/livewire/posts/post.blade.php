<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Post
    </h2>
</x-slot>
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-4 py-4">
            @if (session()->has('message'))
                <div class="bg-teal-100 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 shadow-md my-3"
                    role="alert">
                    <div class="flex">
                        <div>
                            <p class="text-sm">{{ session('message') }}</p>
                        </div>
                    </div>
                </div>
            @endif
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
                <div id="content" class="text-gray-700 text-base m-auto" readonly="readonly">
                    <p>{!! $post->content !!}</p>
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
                <form class="w-full max-w-lg">
                    <div class="flex flex-wrap -mx-3">
                        <label for="comment-form" class="block text-gray-700 text-sm font-bold mb-2">Comments</label>
                        <textarea
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            id="comment-form" placeholder="Enter Content" wire:model="comment"></textarea>
                        @error('comment') <span class="text-red-500">{{ $message }}</span>@enderror <br>
                    </div>
                    <div class="flex flex-wrap -mx-3 mb-6">
                    <button wire:click="comment_store()" type="button"
                                class="inline-flex items-center px-4 py-2 my-3 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150">
                                Send
                            </button>
                    </div>
                </form>
                        <div class="bg-gray-100 overflow-hidden shadow-xl px-6 pt-4">
                            @foreach ($post->comments as $comment)
                                <div>
                                    <p class="text-gray-500 font-bold">
                                        {{ $comment->author->first_name . ' ' . $comment->author->last_name }}</p>
                                    <p class="text-gray-400 text-xs">{{ $comment->created_at->format('d F Y g:i a') }}
                                    </p>
                                    <p class="text-gray-500 pb-4">{{ $comment->comment }}</p>
                                </div>
                            @endforeach
                        </div>

            </div>
        </div>
    </div>
</div>

<script>
    ClassicEditor
        .create(document.querySelector('#content'))
        .then( editor => {
            const toolbarElement = editor.ui.view.toolbar.element;
            toolbarElement.style.display = "none";
            editor.enableReadOnlyMode( '#content' );
        } )
        .catch(error => {
            console.error(error);
        });
</script>