<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Post;
use Livewire\Attributes\Validate; 

class PostIndex extends Component
{

    public bool $postModal = false;

    #[Validate('required')] 
    public $title = '';

    #[Validate('required')] 
    public $slug = '';

    #[Validate('required')] 
    public $body = '';
 
    public function save()
    {

        $this->validate(); 
        Post::create(
            $this->only(['title', 'slug','body'])
        );
 
        return $this->redirect('/posts')
            ->with('status', 'Post successfully created.');    }

    public function render()
    {
        return view('livewire.post-index');
    }
}
