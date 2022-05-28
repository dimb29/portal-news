<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Dashboard
    </h2>
</x-slot>

<x-slot name="footer">
</x-slot>
<div class="py-12 bg-yellow">
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
            <div class="grid grid-flow-row grid-cols-4  gap-4">
                @foreach ($trend->skip(0)->take(4) as $post)
                    <div class="max-w-sm rounded overflow-hidden shadow-lg hover:bg-gray-300">
                        <div class="rounded-lg text-slate-500 hover:text-blue-600 transition duration-150 transform hover:scale-90">
                            <a wire:click="countview({{ $post->id}})" href="{{ url('dashboard/posts', $post->id) }}">
                            <img class="object-cover h-48 w-96" src="{{ $post->url }}">
                                <div class="font-bold text-sm mb-2">{{ $post->title }}</div>
                            </a>
                        </div>
                    </div>
            @endforeach
            </div>


            <div class="flex flex-row">
                <div class="flex-auto m-2 w-96">
                    <div class="flex flex-col">
                        <div class="flex-auto m-1">
                            @if ($first != null)
                                <div class="max-w-full">
                                    <div class="px-2 py-2 rounded overflow-hidden shadow-lg hover:bg-gray-300">
                                        <a wire:click="countview({{$first['id']}})" href="{{ url('dashboard/posts', $first['id']) }}">
                                        <!-- <a wire:click="countview2($first['id'])" href=""> -->
                                        <img src="{{ $first['url'] }}">
                                            <div class="font-bold text-xl mb-2">{{ $first['title'] }}</div>
                                        </a>
                                    </div>
                                </div>
                            @endif
                        </div>
                        <div class="flex-auto m-1">
                            <table class="table-auto">
                                <tbody>
                                    @foreach ($posts->skip(1)->take(5) as $post)
                                        <tr class="hover:bg-gray-300 text-slate-500 transition duration-150 transform hover:scale-90">
                                        <td class="w-60 pr-4">
                                            <a wire:click="countview({{ $post->id}})" href="{{ url('dashboard/posts', $post->id) }}">
                                            <img class="object-cover h-36 w-64"src="{{ $post->url }}">
                                            </a>
                                        </td>
                                        <td>
                                            <a class="text-slate-500 hover:text-blue-600" wire:click="countview({{ $post->id}})" href="{{ url('dashboard/posts', $post->id) }}">
                                            {{ $post->title }}
                                            <p>
                                                {!!Str::words($post->content, 20, '...') !!}
                                            </p>
                                            </a>
                                        </td>
                                        </tr>
                                    @endforeach
                                    <tr>
                                        <td colspan="2">
                                            <button class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">
                                                Selengkapnya
                                            </button>
                                        </td>
                                    </tr>
                                </tbody>
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