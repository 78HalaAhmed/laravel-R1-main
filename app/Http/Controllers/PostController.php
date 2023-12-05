<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Models\Post;
use Illuminate\Support\Facades\Redirect;

class PostController extends Controller
{
    private $postColumns = ['title', 'content', 'published'];
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::get();
        return view('posts', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('addPosts');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'title'=>'required|string',
            'content'=>'required|string|max:100'
        ]);
        $data = $request->only($this->postColumns);
        $data['published'] = isset($data['published'])? true : false;
        Post::create($data);
        return redirect('posts');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $post = Post::findOrFail($id);
        return view('postDetail', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $post = Post::findOrFail($id);
        return view('updatePost', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id): RedirectResponse
    {
        $data = $request->only($this->postColumns);
        $data['published'] = isset($data['published'])? true : false;
        Post::where('id', $id)->update($data);
        return redirect('posts');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): RedirectResponse
    {
        Post::where('id', $id)->delete();        
        return redirect('posts');
    }

    public function trashedPosts()
    {
        $posts = Post::onlyTrashed()->get();
        return view('trashedPosts', compact('posts'));
    }

    public function restorePost(string $id): RedirectResponse
    {
        Post::where('id', $id)->restore();
        return redirect('posts');
    }

    public function finalDeletePost(string $id): RedirectResponse
    {
        Post::where('id', $id)->forceDelete();
        return redirect('trashedPosts');
    }
}
