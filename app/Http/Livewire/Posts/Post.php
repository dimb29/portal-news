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
        $posttrend = PostModel::join('images', 'posts.id', '=', 'images.post_id')
                        ->select('posts.id', 'posts.title', 'posts.content', 'posts.views', 'images.url')
                        ->orderBy('posts.views', 'desc')->get();
                        $no = 1;

        return view('livewire.posts.post', [
            'trend' => $posttrend,
            'no' => $no]);
    }

    public function comment_store(){
        
        $data = $this->validate([
            'comment' => 'required',
            
        ]);
        // Update or Insert Post
        Comment::create([
            'comment' => $this->comment,
            'post_id' => $this->post['id'],
            'author_id' => Auth::user()->id,
        ]);
    }
}
