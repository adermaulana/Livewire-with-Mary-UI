<?php

namespace App\Livewire;

use App\Livewire\Forms\PostForm;
use Livewire\Component;
use Livewire\Attributes\Validate; 
use Livewire\WithPagination;

class PostIndex extends Component
{
    use WithPagination;
    
    public PostForm $form;

    public bool $postModal = false;

 
    public function save()
    {  
        $this->form->store();
        $this->postModal = false;

        return $this->redirect('/posts');
    }

    public function render()
    {
        return view('livewire.post-index');
    }
}
