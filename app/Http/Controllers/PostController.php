<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\PostCard;
use App\Models\PostDeck;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;

class PostController extends Controller
{

    use AuthorizesRequests;

    public function edit(Post $post)
    {
        return view('forum.edit', compact('post'));
    }

    public function editDeck(PostDeck $post)
    {
        return view('forum.edit', compact('post'));
    }

    public function editCard(PostCard $post)
    {
        return view('forum.edit', compact('post'));
    }

    public function update(Request $request, Post $post)
    {

        $request->validate([
            'content' => 'required|string|max:255',
            'image' => 'nullable|image',
            'video' => 'nullable|mimes:mp4,mov,ogg,qt|max:20000',
        ]);

        $post->content = $request->input('content');

        if ($request->hasFile('image')) {
            $post->image_path = $request->file('image')->store('images', 'public');
        }

        if ($request->hasFile('video')) {
            $post->video_path = $request->file('video')->store('videos', 'public');
        }

        $post->save();

        return redirect()->route('forum.general')->with('success', 'Post updated successfully');
    }

    public function updateDeck(Request $request, PostDeck $post)
    {

        $request->validate([
            'content' => 'required|string|max:255',
            'image' => 'nullable|image',
            'video' => 'nullable|mimes:mp4,mov,ogg,qt|max:20000',
        ]);

        $post->content = $request->input('content');

        if ($request->hasFile('image')) {
            $post->image_path = $request->file('image')->store('images', 'public');
        }

        if ($request->hasFile('video')) {
            $post->video_path = $request->file('video')->store('videos', 'public');
        }

        $post->save();

        return redirect()->route('forum.deck')->with('success', 'Post updated successfully');
    }

    public function updateCard(Request $request, PostCard $post)
    {

        $request->validate([
            'content' => 'required|string|max:255',
            'image' => 'nullable|image',
            'video' => 'nullable|mimes:mp4,mov,ogg,qt|max:20000',
        ]);

        $post->content = $request->input('content');

        if ($request->hasFile('image')) {
            $post->image_path = $request->file('image')->store('images', 'public');
        }

        if ($request->hasFile('video')) {
            $post->video_path = $request->file('video')->store('videos', 'public');
        }

        $post->save();

        return redirect()->route('forum.card')->with('success', 'Post updated successfully');
    }
}
