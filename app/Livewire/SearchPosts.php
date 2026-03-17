<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Post;

class SearchPosts extends Component
{
    public $search = '';

    public function render()
    {
        if (!$this->search) {
            $posts = Post::all();
        } else {
            if (!Post::where('title', 'like', '%' . $this->search . '%')->exists()) {
                $posts = Post::all();
                session()->flash('alert', 'Nessun post corrisponde alla tua ricerca');
            } else {
                $posts = Post::where('title', 'like', '%' . $this->search . '%')->get();
            }
        }

        return view('livewire.search-posts', compact('posts'));
    }
}
