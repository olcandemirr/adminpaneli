<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Search;
use Illuminate\Http\Request;
use App\Models\Game;

class SearchController extends Controller
{

    public function index()
    {
        $searches = Search::orderBy('created_at', 'DESC')->get();
        return view('admin.searches.index', compact('searches'));
    }


    public function destroy(Search $search)
    {
        $search->delete();
        return redirect()->route('searches.index')->with('success', 'Arama kaydı silindi!');
    }
    public function perform(Request $request)
    {
        $keyword = $request->q;

        
        \App\Models\Search::create([
            'keyword' => $keyword,
            'user_id' => auth()->id() ?? null,
        ]);

        $games = Game::where('name', 'LIKE', "%$keyword%")->get();
        return view('frontend.search_results', compact('games'));
    }
}
