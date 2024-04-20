<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::latest();
        $categories = Category::all();

        if (request('search') != "") {
            $posts
            ->where('title', 'like', '%'. request('search'). '%')
            ->orWhere('body', 'like', '%'. request('search'). '%');
        }

        if (request('category')) {                        
            $category = Category::whereRaw('LOWER(title) = ?', [strtolower(request('category'))])->first();
            
            if ($category) {
                $posts
                ->where('category_id', 'like', '%'. $category->id. '%');
            }
        }

        return view('blog.index', [
            'posts' => $posts->get(),
            'categories' => $categories
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {    
        return view("blog.create",[
            'categories' => Category::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $attributes = $request->validate([
            'title' => 'required|string',
            'slug' => 'required|string|unique:posts,title|min:3|max:21',
            'body' => 'required|string|min:3',
            'image' => 'string|nullable'
        ]);
        $attributes['user_id'] = auth()->user()->id;
        $attributes['category_id'] = 1;
        Post::create($attributes);

        return redirect('/blog')->with('success', 'Your Post has been created.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        
        return view('blog.blog', [
            'post' => $post
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($post)
    {
        $post = Post::findOrFail($post);
        return view('blog.edit',[
            'post' => $post,
            'categories' => Category::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $post)
    {
        $post = Post::findOrFail($post);
        
        $attributes = $request->validate([
            'title' => 'required|string',
            'slug' => 'required|string|unique:posts,title|min:3|max:21',
            'body' => 'required|string|min:3',
            'image' => 'string|nullable',
            'category_id' => 'exists:categories,id|required'
        ]);
        $attributes['user_id'] = auth()->user()->id;

        $post->update($attributes);
        return redirect('/blog/'.$post->id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        //
    }
}
