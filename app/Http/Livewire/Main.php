<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\Image;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class Main extends Component
{


    public $isOpen = 0;
    public $search;
    protected $queryString = ['search'];

    public function render()
    {

        $post = Post::join('images', 'posts.id', '=', 'images.post_id')
                        ->select('posts.id', 'posts.title', 'posts.content', 'posts.views', 'images.url')
                        ->orderBy('posts.id', 'desc')->get();
                        
        $posttrend = Post::join('images', 'posts.id', '=', 'images.post_id')
                        ->select('posts.id', 'posts.title', 'posts.content', 'posts.views', 'images.url')
                        ->orderBy('posts.views', 'desc')->get();   

        if (!$post->isEmpty()){
            $first = $post->firstorfail()->toArray();
        }
        $no = 1;
        
        return view('livewire.main', [
                        'posts' => $post,
                        'first' => $first,
                        'trend' => $posttrend,
                        'no' => $no]);
    }

    public function countview($id)
    {
        $getdata = Post::select('views')
                        ->where('id', $id)
                        ->firstorfail()->toArray();
        $count = $getdata['views'] + '1';

        Post::where('id', $id)->update(['views' => $count]);
    }
    public function countview2($id){
        dd($id);
    }
}
