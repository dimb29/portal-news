<div class="max-w-md">
    <input wire:click="searchClick()" wire:model="search" type="text" class="mt-4 mb-2 shadow appearance-none border rounded w-full max-w-md py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Search news">
    @if ($isOpen)
    <div class="fixed bg-white rounded rounded-b">
        <div class="bg-white py-3 px-2 shadow focus:shadow-outline">
            <table class="table-auto">
                <tbody>
                    @foreach ($postsearch as $post)
                    <livewire:search-single :search="$post" :key="$post->id"/>
                    @endforeach
                </tbody>
            </table>
            {{$posts->links()}}
        </div>
    </div>
    @endif
</div>
