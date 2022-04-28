<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Post;

class Search extends Component
{
    protected $updatesQueryString = ['search'];
    public $search;
    public function render()
    {
        
        $posts = Post::join('images', 'posts.id', '=', 'images.post_id')
            ->select('posts.id', 'posts.title', 'posts.content', 'posts.views', 'images.url')
            ->orderBy('posts.id', 'desc')->paginate(5);

        if($this->search !== null){
            $posts = Post::join('images', 'posts.id', '=', 'images.post_id')
                            ->select('posts.id', 'posts.title', 'posts.content', 'posts.views', 'images.url')
                            ->where('posts.title', 'like', '%' . $this->search . '%')
                            ->orderBy('posts.id', 'desc')->paginate(5);
        }

        return view('livewire.search',['posts' => $posts]);
    }
}
