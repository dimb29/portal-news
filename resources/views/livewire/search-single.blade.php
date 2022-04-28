<tr class="hover:bg-gray-300">
<td class="w-60 pr-4">
    <a wire:click="countview({{ $search->id}})" href="{{ url('dashboard/posts', $search->id) }}">
    <img src="{{ $search->url }}">
    </a>
</td>
<td>
    <a wire:click="countview({{ $search->id}})" href="{{ url('dashboard/posts', $search->id) }}">
        <b>{{ $search->title }}</b>
    <p class="text-gray-700 text-base">
        {!!Str::words($search->content, 20, '...') !!}
    </p>
    </a>
</td>
</tr>