<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Form;
use App\Models\Post;

class PostForm extends Form
{
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
}
