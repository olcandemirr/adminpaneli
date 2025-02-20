<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Game;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Category;
use App\Models\Search;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class GameController extends Controller
{
    //listeleme
    public function index(Request $request)
    {
        $query = Game::query();

        if ($request->has('search')) {
            $searchTerm = $request->search;
            $query->where('name', 'LIKE', '%' . $searchTerm . '%');
            
            $search = Search::where('keyword', $searchTerm)->where('search_type', 'game')->first();
            if ($search) {
                $search->increment('search_count');
            } else {
                Search::create([
                    'keyword' => $searchTerm,
                    'search_type' => 'game',
                    'user_id' => auth()->id(),
                    'search_count' => 1
                ]);
            }
        }

        $games = $query->orderBy('id', 'DESC')->get();
        return view('admin.games.index', compact('games'));
    }

    //oluşturmaya yönlendirme
    public function create()
    {
        $categories = Category::orderBy('name')->get();
        return view('admin.games.create', compact('categories'));
    }

    //kaydettiriyorum
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:3',
            'slug' => 'nullable|unique:games,slug',
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:5120', // 5MB sınırı
            'tags' => 'nullable|string',
            'description' => 'nullable|string',
            'game_link' => 'required|url',
            'width' => 'required|integer',
            'height' => 'required|integer',
            'is_active' => 'required|boolean',
            'is_editor_choice' => 'required|boolean',
            'played_count' => 'nullable|integer',
            'category_id' => 'required|integer|exists:categories,id',
        ]);
    
        
        $imagePath = null;
        if ($request->hasFile('image')) {
            $directory = storage_path('app/public/games');
            if (!File::exists($directory)) {
                File::makeDirectory($directory, 0777, true);
            }
            
            $imagePath = $request->file('image')->store('games', 'public');
        }
    
        
        $game = Game::create([
            'name' => $request->name,
            'slug' => $request->slug ?? Str::slug($request->name),
            'meta_title' => $request->meta_title,
            'meta_description' => $request->meta_description,
            'image' => $imagePath,  
            'tags' => $request->tags,
            'description' => $request->description,
            'game_link' => $request->game_link,
            'width' => $request->width,
            'height' => $request->height,
            'is_active' => $request->is_active,
            'is_editor_choice' => $request->is_editor_choice,
            'played_count' => $request->played_count ?? 0,
            'category_id' => $request->category_id,
        ]);
    
        return redirect()->route('games.index')->with('success', 'Oyun başarıyla eklendi!');
    }
    

    //gösterme
    public function show($id)
    {

        return redirect()->route('games.index');
    }

    //düzenlemeye gönderdim
    public function edit(Game $game)
    {
        $categories = Category::orderBy('name')->get();
        return view('admin.games.edit', compact('game', 'categories'));
    }

    //güncellemee
    public function update(Request $request, Game $game)
    {
        $request->validate([
            'name' => 'required|min:3',
            'slug' => 'nullable|unique:games,slug,' . $game->id,
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:5120',
            'tags' => 'nullable|string',
            'description' => 'nullable|string',
            'game_link' => 'required|url',
            'is_active' => 'required|boolean',
            'is_editor_choice' => 'required|boolean',
            'played_count' => 'nullable|integer',
            'category_id' => 'required|integer|exists:categories,id',
        ]);
        if ($request->hasFile('image')) {
            
            if ($game->image) {
                Storage::delete('public/' . $game->image);
            }
            $directory = storage_path('app/public/games');
            if (!File::exists($directory)) {
                File::makeDirectory($directory, 0777, true);
            }
            
            $game->image = $request->file('image')->store('games', 'public');
        }
        $game->update([
            'name' => $request->name,
            'slug' => $request->slug ?? Str::slug($request->name),
            'meta_title' => $request->meta_title,
            'meta_description' => $request->meta_description,
            'image' => $game->image, 
            'tags' => $request->tags,
            'description' => $request->description,
            'game_link' => $request->game_link,
            'width' => $request->width,
            'height' => $request->height,
            'is_active' => $request->is_active,
            'is_editor_choice' => $request->is_editor_choice,
            'played_count' => $request->played_count ?? 0,
            'category_id' => $request->category_id,
        ]);

        return redirect()->route('games.index')->with('success', 'Oyun başarıyla güncellendi!');
    }


    public function destroy(Game $game)
    {
        $game->delete();
        return redirect()->route('games.index')->with('success', 'Oyun silindi!');
    }
}
