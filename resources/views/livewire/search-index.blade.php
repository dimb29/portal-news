<div class="max-w-md">
    <input id="searchbox" wire:model="search" data-toggle="modal" data-target="#searchmodal" type="text" class="mt-3 mb-2 shadow appearance-none border rounded w-full max-w-md py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Search news">
    <div id="searchmodal" class="fixed modal z-10 bg-white rounded rounded-b">
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
</div>
<script>
    $(document).ready(function(){
        $("#searchmodal").hide();
        $("#searchbox").on('keyup',function(){
            $("#searchmodal").modal();
        });
    });
</script>