<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Post
    </h2>
</x-slot>
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
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
            
            


            <div class="flex flex-row">
                <div class="flex-auto m-2 w-96">
                    <div class="flex flex-col">
                        <div class="flex-auto m-1">
                            
                        




                        </div>
                        <div class="flex-auto m-1">
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
                            <img src="{{ $image->url }}" alt="{{ $image->description }}" width="100%">
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
                            @foreach ($comms   as $comment)
                                <div class="border-gray-300 border-b pt-2 mb-2">
                                    <p class="text-gray-500 font-bold">
                                        {{ $comment->first_name . ' ' . $comment->last_name }}
                                    </p>
                                    <p class="text-gray-400 text-xs">
                                        {{ $comment->created_at->format('d F Y g:i a') }}
                                    </p>
                                    <p class="text-gray-500">{{ $comment->comment }}</p>
                                    @if(Auth::user() != null)
                                    {{Auth::user()->id}}
                                        @if($comment->fill == 1 && $comment->user_id == Auth::user()->id )
                                            <i id="comment_like" wire:click="comment_like($id = {{$comment->id}}, $fill = {{$comment->fill}}, $id_like = {{$comment->id_like}})" class="mx-1 fa-solid fa-thumbs-up text-red-600"></i>
                                        @elseif($comment->fill == 2)
                                            <i id="comment_like" wire:click="comment_like($id = {{$comment->id}}, $fill = {{$comment->fill}}, $id_like = {{$comment->id_like}})" class="mx-1 fa-regular fa-thumbs-up text-blue-600 hover:text-red-600"></i>
                                        @else
                                            <i id="comment_like" wire:click="comment_like($id = {{$comment->id}}, $fill= 0, $id_like = 0)" class="mx-1 fa-regular fa-thumbs-up text-blue-600 hover:text-red-600"></i>
                                        @endif
                                    @endif
                                    0 likes
                                    <i id="replay_comment" class="mx-1 fa-regular fa-comment-dots"></i>
                                </div>
                            @endforeach
                        </div>
                        <div>
                        </div>
    
                            </table>
                        </div>
                    </div>
                </div>
                <div class="flex-auto m-2 w-32">
                    <div class="flex flex-col">
                        <div class="flex-auto m-1">
                            <div class="rounded divide-y sm:divide-y-2 md:divide-y-4 lg:divide-y-8 xl:divide-y-0 divide-gray-400 w-full text-sm text-left text-gray-500 dark:text-gray-400 overflow-x-auto">
                                <table class="m-4 w-full text-sm text-left text-gray-500 dark:text-white">
                                <thead class="text-xs text-gray-50 uppercase bg-gray-500 dark:bg-gray-700 dark:text-gray-400">
                                    <tr>
                                        <td></td>
                                        <td>Kasus Positif</td>
                                        <td>Meninggal</td>
                                        <td>Sembuh</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Indonesia</td>
                                        <td>6,43,246</td>
                                        <td>156,040</td>
                                        <td>5,866,169</td>
                                    </tr>
                                    <td>Seluruh Dunia</td>
                                    <td>507,935,709</td>
                                    <td>6,236,,937</td>
                                    <td>460,334,403</td>
                                </tbody> 
                                </table>
                            </div>
                        </div>
                        <div class="flex-auto m1">
                            <table class="table table-auto font-bold w-full rounded-lg shadow-lg">
                                <thead>
                                    <th colspan="2" class="italic bg-gray-500 text-yellow-300">#Top Trending</th>
                                </thead>
                                <tbody>    
                                @foreach ($trend->skip(0)->take(10) as $post)
                                    <a wire:click="countview({{ $post->id}})" href="{{ url('dashboard/posts', $post->id) }}">
                                    <tr class="bg-gray-800 text-gray-300 border-b border-white">
                                        <td class="text-lg px-6 py-3">#{{$no++}}</td>
                                        <td class="text-base px-6 py-3">{{$post->title}}</td>
                                    </tr>
                                    </a>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
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

$(document).ready(function(){
    $('#comment_like').on('click',function(){
        $('#comment_like').removeClass('fa-regular');
        $('#comment_like').addClass('fa-solid');
        console.log(<?php $post->comment ?> + 'bisa yok');
    });
});
</script>