<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class DeckController extends Controller
{
    public function index()
    {
        try {
            $response = Http::get('https://api.pokemontcg.io/v2/cards', [
                'pageSize' => 10,
            ]);

            if ($response->successful()) {
                $cards = $response->json()['data'] ?? [];
            } else {
                $cards = [];
            }
        } catch (\Exception $e) {
            $cards = [];
        }

        return view('common.deckbuilder', compact('cards'));
    }
}
