<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Post;
use PDO;

class Posts extends Component
{
    public $title, $body;
    public $posts;
    public $editMode = false;
    public $post_id;
    public function store()
    {
        $data = $this->validate([
            'title' => 'required',
            'body' => 'required'
        ]);
        Post::create($data);

        session()->flash('message', 'Post Created Successfully!');
        $this->resetInputField();
    }
    public function resetInputField()
    {
        $this->title = '';
        $this->body = '';
    }
    public function edit($id)
    {

        $this->editMode = true;
        $post = Post::find($id);
        $this->title = $post->title;
        $this->body = $post->body;
        $this->post_id = $id;
    }
    public function update()
    {
        $data = $this->validate([
            'title' => 'required',
            'body' => 'required'
        ]);
        $post = Post::find($this->post_id);
        $post->update($data);

        session()->flash('message', 'Post Updated Successfully!');
        $this->resetInputField();
        $this->editMode = false;
    }
    public function cancel()
    {
        $this->editMode = false;
        $this->resetInputField();
    }
    public function delete($id)
    {
        $post = Post::find($id);
        $post->delete();
    }
    public function render()
    {
        $this->posts = Post::all();
        return view('livewire.posts');
    }
}
