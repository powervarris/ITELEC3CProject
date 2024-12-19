<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class NewsController extends Controller
{
//    public function index()
//    {
//        $newsItems = [
//            [
//                'title' => 'New Pocket TCG Expansion: Legendary Treasures',
//                'description' => 'The Legendary Treasures expansion is out, introducing new rare cards and abilities to enhance gameplay.',
//                'image' => asset('images/expansion.jpg'),
//                'link' => 'https://www.pokemon.com/us/pokemon-tcg/'
//            ],
//            [
//                'title' => 'Pokémon Pocket Winter Championship',
//                'description' => 'Prepare for the ultimate battle as the Winter Championship starts this December.',
//                'image' => asset('images/champion.jpg'),
//                'link' => 'https://www.pokemon.com/us/play-pokemon/'
//            ],
//            [
//                'title' => 'Top Strategies for Pokémon Pocket Players',
//                'description' => 'Learn the latest meta strategies and tips to outplay your opponents in Pokémon Pocket.',
//                'image' => asset('images/strategies.jpg'),
//                'link' => 'https://www.pokemon.com/us/pokemon-tcg/'
//            ],
//            [
//                'title' => 'Upcoming Pokémon Pocket Collectible Cards',
//                'description' => 'Exclusive sneak peek at new collectible cards launching this season for Pocket players.',
//                'image' => asset('images/upcoming.jpg'),
//                'link' => 'https://www.pokemon.com/us/pokemon-tcg/'
//            ],
//            [
//                'title' => 'Pokémon Pocket Events: December Highlights',
//                'description' => 'Stay tuned for Pocket-exclusive events happening this December with exciting rewards.',
//                'image' => asset('images/december.jpg'),
//                'link' => 'https://www.pokemon.com/us/play-pokemon/'
//            ],
//            [
//                'title' => 'Rare Pokémon Pocket Cards in 2024',
//                'description' => 'Check out the rarest Pokémon Pocket cards you might encounter this year.',
//                'image' => asset('images/crown.jpg'),
//                'link' => 'https://www.pokemon.com/us/pokemon-tcg/'
//            ]
//        ];
//
//        return view('common.news', compact('newsItems'));
//    }

    public function index()
    {
        $newsItems = News::all();
        return view('common.news', compact('newsItems'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'link' => 'required|url',
        ]);

        $imagePath = $request->file('image')->store('images', 'public');

        News::create([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'image' => $imagePath,
            'link' => $request->input('link'),
        ]);

        return redirect()->route('news.index')->with('success', 'News added successfully!');
    }

    public function destroy($id)
    {
        $news = News::findOrFail($id);
        $news->delete();

        return redirect()->route('news.index')->with('success', 'News item deleted successfully.');
    }
}
