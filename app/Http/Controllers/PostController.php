<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class PostController extends Controller
{
    public function index()
    {
        return view('posts.index', [

            'posts' => Post::latest()->filter(request([
                'search', 'category', 'author'
            ]))->simplePaginate(6)->withQueryString()


        ]);
    }

    public function show(Post $post)
    {
        return view('posts.show', [
            'post' => $post
        ]);
    }

    public function create(Category $category)
    {
        return view('posts.create', [
            'categories' => Category::all()
        ]);
    }

    public function store()
    {
        $attributes = \request()->validate([
            'title' => 'required',
            'slug' => 'required|unique:posts,slug',
            'excerpt' => 'required',
            'thumbnail'=> 'required|image',
            'body' => 'required',
            'category_id'=>'required|exists:categories,id'
        ]);

        $attributes['user_id']= auth()->user()->id;
        $attributes['thumbnail']= \request()->file('thumbnail')->store('thumbnails');
        Post::create($attributes);

        return redirect('/');
    }

    public function edit(Post $post)
    {
        return view('admin.post.edit',[
            'post'=> $post,
            'categories' => Category::all()
        ]);
    }

    public function update(Post $post)
    {
        $attributes = \request()->validate([
            'title' => 'required',
            'slug' => ['required',Rule::unique('posts','slug')->ignore($post)],
            'excerpt' => 'required',
            'thumbnail'=> 'image',
            'body' => 'required',
            'category_id'=>'required|exists:categories,id'
        ]);

        if (request()->file('thumbnail')){
            $attributes['thumbnail']= \request()->file('thumbnail')->store('thumbnails');
        }
        $post->update($attributes);

        return back()->with('success','Post updated');
    }

    public function delete(Post $post)
    {
        $post->delete();

        return back()->with('success','Post deleted');
    }
}
