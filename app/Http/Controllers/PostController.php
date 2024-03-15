<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\StorePostRequest; 
use App\Http\Requests\UpdatePostRequest;

/**
 * Class PostController
 * @package App\Http\Controllers
 */
class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index(): View
    {
        return view('posts.index', [
            'posts' => Post::latest()->paginate(10)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create(): View
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StorePostRequest $request
     * @return RedirectResponse
     */
    public function store(StorePostRequest $request): RedirectResponse
    {
        $post = Post::create($request->validated());

        return redirect()->route('posts.index')
            ->withSuccess('Post created successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param Post $post
     * @return View
     */
    public function show(Post $post): View
    {
        return view('posts.show', [
            'post' => $post
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Post $post
     * @return View
     */
    public function edit(Post $post): View
    {
        return view('posts.edit', [
            'post' => $post
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdatePostRequest $request
     * @param Post $post
     * @return RedirectResponse
     */
    public function update(UpdatePostRequest $request, Post $post): RedirectResponse
    {
        $post->update($request->validated());

        return redirect()->route('posts.index')
            ->withSuccess('Post updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Post $post
     * @return RedirectResponse
     */
    public function destroy(Post $post): RedirectResponse
    {
        $post->delete();

        return redirect()->route('posts.index')
            ->withSuccess('Post deleted successfully!');
    }
}