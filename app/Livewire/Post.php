<?php

namespace App\Livewire;


use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithFileUploads;

class Post extends Component
{
    use WithFileUploads;

    public $categories;
#[validate('required')]
    public $title;
    #[validate('required|unique:posts,slug')]
    public $slug;
    #[validate('required')]
    public $excerpt;
    #[validate('required|image')]
    public $thumbnail;
    #[validate('required')]
    public $body;
    #[validate('required|exists:categories,id')]
    public $category_id;


    public function create()
    {
        $this->validate();
        $attributes = array_merge($this->except('categories'),[
            'user_id'=>auth()->user()->id,
            'thumbnail'=>$this->thumbnail->store('thumbnails')
        ]);
        \App\Models\Post::create($attributes);

        return redirect('/');
    }
    public function render()
    {
        return view('livewire.posts.post');
    }
}
