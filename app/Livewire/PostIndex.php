<?php

namespace App\Livewire;

use Illuminate\Support\Arr;
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

    public $myChart ='';
    
    public function mount()
    {
        $dataFromDatabase = Post::get(); // Fetch data from the database, adjust this query according to your database structure
        
        // Format the fetched data into the structure needed for the chart
        $labels = $dataFromDatabase->pluck('title')->toArray();
        $data = $dataFromDatabase->pluck('watch')->toArray();

        $this->myChart = [
            'type' => 'pie',
            'data' => [
                'labels' => $labels,
                'datasets' => [
                    [
                        'label' => '# of Votes',
                        'data' => $data,
                    ]
                ]
            ]
        ];
    }
    public function randomize()
    {
        Arr::set($this->myChart, 'data.datasets.0.data', [fake()->randomNumber(2), fake()->randomNumber(2), fake()->randomNumber(2)]);
    }
    
    public function switch()
    {
        $type = $this->myChart['type'] == 'bar' ? 'pie' : 'bar';
        Arr::set($this->myChart, 'type', $type);
    }
 
    public function showModal(){
        $this->form->reset();
        $this->editMode = false;
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
