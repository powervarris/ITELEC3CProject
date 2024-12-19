<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\PostDeck;
use App\Models\PostCard;

class ForumController extends Controller
{
    public function index()
    {
        $posts = Post::with('user', 'comments.user')->latest()->get();
        return view('forum.general', compact('posts'));
    }

    public function indexDeck()
    {
        $posts = PostDeck::with('user')->latest()->get();
        return view('forum.deck', compact('posts'));
    }

    public function indexCard()
    {
        $posts = PostCard::with('user')->latest()->get();
        return view('forum.card', compact('posts'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'content' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'video' => 'nullable|mimes:mp4,mov,ogg,qt|max:20000',
        ]);

        $post = new Post();
        $post->content = $request->input('content');
        $post->user_id = auth()->id();

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
            $post->image_path = $imagePath;
        }

        if ($request->hasFile('video')) {
            $videoPath = $request->file('video')->store('videos', 'public');
            $post->video_path = $videoPath;
        }

        $post->save();

        return redirect()->route('forum.general')->with('success', 'Post created successfully!');
    }

    public function storeDeck(Request $request)
    {
        $request->validate([
            'content' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'video' => 'nullable|mimes:mp4,mov,ogg,qt|max:20000',
        ]);

        $post = new PostDeck();
        $post->content = $request->input('content');
        $post->user_id = auth()->id();

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
            $post->image_path = $imagePath;
        }

        if ($request->hasFile('video')) {
            $videoPath = $request->file('video')->store('videos', 'public');
            $post->video_path = $videoPath;
        }

        $post->save();

        return redirect()->route('forum.deck')->with('success', 'Post created successfully!');
    }

    public function storeCard(Request $request)
    {
        $request->validate([
            'content' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'video' => 'nullable|mimes:mp4,mov,ogg,qt|max:20000',
        ]);

        $post = new PostCard();
        $post->content = $request->input('content');
        $post->user_id = auth()->id();

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
            $post->image_path = $imagePath;
        }

        if ($request->hasFile('video')) {
            $videoPath = $request->file('video')->store('videos', 'public');
            $post->video_path = $videoPath;
        }

        $post->save();

        return redirect()->route('forum.card')->with('success', 'Post created successfully!');
    }

    public function destroy(Post $post)
    {
        if (auth()->id() !== $post->user_id) {
            return redirect()->route('forum.general')->with('error', 'You are not authorized to delete this post.');
        }

        $post->delete();

        return redirect()->route('forum.general')->with('success', 'Post deleted successfully.');
    }

    public function destroyCard(PostCard $post)
    {
        if (auth()->id() !== $post->user_id) {
            return redirect()->route('forum.card')->with('error', 'You are not authorized to delete this post.');
        }

        $post->delete();

        return redirect()->route('forum.card')->with('success', 'Post deleted successfully.');
    }

    public function destroyDeck(PostDeck $post)
    {
        if (auth()->id() !== $post->user_id) {
            return redirect()->route('forum.deck')->with('error', 'You are not authorized to delete this post.');
        }

        $post->delete();

        return redirect()->route('forum.deck')->with('success', 'Post deleted successfully.');
    }

    public function storeComment(Request $request, $postId)
    {
        $request->validate([
            'content' => 'required|string|max:255',
        ]);

        $comment = new Comment();
        $comment->content = $request->input('content');
        $comment->user_id = auth()->id();
        $comment->post_id = $postId;
        $comment->save();

        return redirect()->route('forum.general')->with('success', 'Comment added successfully!');
    }

    public function storeCommentDeck(Request $request, $postId)
    {
        $request->validate([
            'content' => 'required|string|max:255',
        ]);

        $comment = new Comment();
        $comment->content = $request->input('content');
        $comment->user_id = auth()->id();
        $comment->post_id = $postId;
        $comment->save();

        return redirect()->route('forum.deck')->with('success', 'Comment added successfully!');
    }

    public function destroyComment($id)
    {
        $comment = Comment::findOrFail($id);
        $comment->delete();

        return redirect()->back()->with('success', 'Comment deleted successfully.');
    }
}
