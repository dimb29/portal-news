<?php

namespace App\Http\Livewire;

use Livewire\Component;

class SearchSingle extends Component
{
    public $search;

    public function mount($search)
    {
        $this->search = $search;
    }
    public function render()
    {
        return view('livewire.search-single');
    }
    public function countview($id)
    {
        $getdata = Post::select('views')
                        ->where('id', $id)
                        ->firstorfail()->toArray();
        $count = $getdata['views'] + '1';

        Post::where('id', $id)->update(['views' => $count]);
    }
}
