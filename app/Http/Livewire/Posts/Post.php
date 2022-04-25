<?php

namespace App\Http\Livewire\Posts;

use App\Models\Post as PostModel;
use App\Models\Comment;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Post extends Component
{

    public $post;
    public $comment, $category, $post_id;

    public function mount($id)
    {
        $this->post = PostModel::with(['author', 'comments', 'category', 'images', 'videos', 'tags'])->find($id);
    }

    public function render()
    {
        return view('livewire.posts.post');
    }

    public function comment_store(){
        
        $this->validate([
            'comment' => 'required',
        ]);
        
        // Update or Insert Post
        dd($this->post_id);
        Comment::create([
            'comment' => $this->comment,
            'post_id' => $this->post_id,
            'author_id' => Auth::user()->id,
        ]);
    }
}
