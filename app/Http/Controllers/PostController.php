<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\StorePostRequest; 
use App\Http\Requests\UpdatePostRequest;

class PostController extends Controller
{
    public function index():view
    {
        return view('posts.index', [
            'posts' => Post::latest()->paginate(3)
        ]);
    }
    

    public function create(): View
    {
        return view('posts.create');
    }

    public function store(StorePostRequest $request): RedirectResponse
    {
        $post = Post::create($request->validated());

        return redirect()->route('posts.index')
            ->withSuccess('Post created successfully!');
    }

    public function show(Post $post): View
    {
        return view('posts.show', [
            'post' => $post
        ]);
    }

    public function edit(Post $post): View
    {
        return view('posts.edit', [
            'post' => $post
        ]);
    }

    public function update(UpdatePostRequest $request, Post $post): RedirectResponse
    {
        $post->update($request->validated());

        return redirect()->route('posts.index')
            ->withSuccess('Post updated successfully!');
    }

    public function destroy(Post $post): RedirectResponse
    {
        $post->delete();

        return redirect()->route('posts.index')
            ->withSuccess('Post deleted successfully!');
    }


}
