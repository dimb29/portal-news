<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Postssss
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
            @if (Request::getPathInfo() == '/dashboard/posts')
                <button wire:click="create()"
                    class="inline-flex items-center px-4 py-2 my-3 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150">
                    Create New Post
                </button>
            @endif

            @if ($isOpen)
                @include('livewire.posts.create')
            @endif
            <div class="grid grid-flow-row grid-cols-3  gap-4">
                @foreach ($posts as $post)
                    <div class="max-w-sm rounded overflow-hidden shadow-lg hover:bg-gray-300">
                        <div class="px-6 py-4">
                            <a wire:click="countview({{ $post->id}})" href="{{ url('dashboard/posts', $post->id) }}">
                            <img class="object-cover h-48 w-96" src="{{ $post->url }}">
                                <div class="font-bold text-sm mb-2">{{ $post->title }}</div>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="py-4">
            {{ $posts->links() }}
        </div>
    </div>
</div>