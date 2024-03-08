<?php

namespace App\Livewire;

use App\Livewire\Forms\PostForm;
use Livewire\Component;
use Livewire\Attributes\Validate; 
use Livewire\WithPagination;
use App\Models\Post;

class PostIndex extends Component
{
    use WithPagination;
    
    public PostForm $form;

    public $search = '';

    public $page = 5;

    public bool $postModal = false;
    public bool $editMode = false;
 
    public function showModal(){
        $this->form->reset();
        $this->postModal = true;
    }

    public function save()
    {  
        if($this->editMode){
            $this->form->update();
            $this->editMode = false;
        }
        else{
        $this->form->store();
        }
        $this->postModal = false;

    }

    public function delete($id){

        $post = Post::find($id);
        $post->delete();
    }

    public function edit($id){
        $post = Post::find($id);
        $this->form->setPost($post);
        $this->editMode = true;
        $this->postModal = true;
    }

    public function render()
    {
        return view('livewire.post-index');
    }
}
