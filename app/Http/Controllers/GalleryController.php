<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class GalleryController extends Controller
{
    public function index(Request $request)
    {
        try {
            $queryParams = [
                'pageSize' => $request->input('pageSize', 10), // Default to 10 cards per page
                'page' => $request->input('page', 1),
                'q' => '',
            ];
    
            // Add search query dynamically
            if ($request->filled('search')) {
                $queryParams['q'] .= $request->input('search') . ' ';
            }
    
            // Add filters dynamically
            if ($request->filled('pack')) {
                $queryParams['q'] .= 'set.id:' . $request->input('pack') . ' ';
            }
    
            if ($request->filled('type')) {
                $queryParams['q'] .= 'types:' . $request->input('type') . ' ';
            }
    
            if ($request->filled('trainer')) {
                $queryParams['q'] .= 'trainer:' . $request->input('trainer') . ' ';
            }
    
            $response = Http::get('https://api.pokemontcg.io/v2/cards', $queryParams);
    
            $cards = $response->successful() ? $response->json()['data'] : [];
        } catch (\Exception $e) {
            $cards = [];
            \Log::error('API Error:', ['message' => $e->getMessage()]);
        }
    
        if ($request->ajax()) {
            return response()->json(['cards' => $cards, 'page' => $queryParams['page']]);
        }
    
        return view('common.gallery', compact('cards'));
    }    
}
