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

    public function store(){
        
        $this->validate(); 
        Post::create(
            $this->only(['title', 'slug','body'])
        );
  
    }

    public function setPost(Post $post){
        $this->post = $post;
        $this->title = $post->title;
        $this->slug = $post->slug;
        $this->body = $post->body;
    }

    public function update(){
        $this->validate();
        $this->post->update(
            $this->only(['title', 'slug','body'])
        );
        $this->reset();
    }

}
