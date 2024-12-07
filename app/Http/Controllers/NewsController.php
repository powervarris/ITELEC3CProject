<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index()
    {
        $newsItems = [
            [
                'title' => 'New Pocket TCG Expansion: Legendary Treasures',
                'description' => 'The Legendary Treasures expansion is out, introducing new rare cards and abilities to enhance gameplay.',
                'image' => asset('images/expansion.jpg'),
                'link' => 'https://www.pokemon.com/us/pokemon-tcg/'
            ],
            [
                'title' => 'Pokémon Pocket Winter Championship',
                'description' => 'Prepare for the ultimate battle as the Winter Championship starts this December.',
                'image' => asset('images/champion.jpg'),
                'link' => 'https://www.pokemon.com/us/play-pokemon/'
            ],
            [
                'title' => 'Top Strategies for Pokémon Pocket Players',
                'description' => 'Learn the latest meta strategies and tips to outplay your opponents in Pokémon Pocket.',
                'image' => asset('images/strategies.jpg'),
                'link' => 'https://www.pokemon.com/us/pokemon-tcg/'
            ],
            [
                'title' => 'Upcoming Pokémon Pocket Collectible Cards',
                'description' => 'Exclusive sneak peek at new collectible cards launching this season for Pocket players.',
                'image' => asset('images/upcoming.jpg'),
                'link' => 'https://www.pokemon.com/us/pokemon-tcg/'
            ],
            [
                'title' => 'Pokémon Pocket Events: December Highlights',
                'description' => 'Stay tuned for Pocket-exclusive events happening this December with exciting rewards.',
                'image' => asset('images/december.jpg'),
                'link' => 'https://www.pokemon.com/us/play-pokemon/'
            ],
            [
                'title' => 'Rare Pokémon Pocket Cards in 2024',
                'description' => 'Check out the rarest Pokémon Pocket cards you might encounter this year.',
                'image' => asset('images/crown.jpg'),
                'link' => 'https://www.pokemon.com/us/pokemon-tcg/'
            ]
        ];

        return view('common.news', compact('newsItems'));
    }
}
