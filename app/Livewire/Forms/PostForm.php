<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Form;
use App\Models\Post;

class PostForm extends Form
{

    public ?Post $post;
    //
    #[Validate('required')] 
    public $title = '';

    #[Validate('required')] 
    public $slug = '';

    #[Validate('required')] 
    public $body = '';

    #[Validate('required|numeric')] 
    public $watch = '';

    public function store(){
        
        $this->validate(); 
        Post::create(
            $this->only(['title', 'slug','body','watch'])
        );
  
    }

    public function setPost(Post $post){
        $this->post = $post;
        $this->title = $post->title;
        $this->slug = $post->slug;
        $this->body = $post->body;
        $this->watch = $post->watch;
    }

    public function update(){
        $this->validate();
        $this->post->update(
            $this->only(['title', 'slug','body','watch'])
        );
        $this->reset();
    }

}
