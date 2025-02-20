<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Search;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class CategoryController extends Controller
{  //listeleme yaptırdım
    public function index(Request $request)
    {
        $query = Category::query();

        if ($request->has('search')) {
            $searchTerm = $request->search;
            $query->where('name', 'LIKE', '%' . $searchTerm . '%');

            
            $search = Search::where('keyword', $searchTerm)->where('search_type', 'category')->first();
            if ($search) {
                $search->increment('search_count');
            } else {
                Search::create([
                    'keyword' => $searchTerm,
                    'search_type' => 'category',
                    'user_id' => auth()->id(),
                    'search_count' => 1
                ]);
            }
        }

        $categories = $query->orderBy('id', 'DESC')->get();
        return view('admin.categories.index', compact('categories'));
    }
    //kategori oluşturmaya yönlendirme
    public function create()
    {
        return view('admin.categories.create');
    }
        //girilen değerleri kaydetmek için kullanılıtyo
    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required|min:2|unique:categories,name',
            'slug' => 'nullable|unique:categories,slug',
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string',
            'icon' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:5120',
            'description' => 'nullable|string',
        ]);

        $iconPath = null;
        if ($request->hasFile('icon')) {
           
            $directory = storage_path('app/public/category-icons');
           
            if (!File::exists($directory)) {
                File::makeDirectory($directory, 0777, true);
            }
            $iconPath = $request->file('icon')->store('category-icons', 'public');
        }
        Category::create([
            'name' => $request->name,
            'slug' => $request->slug ?? Str::slug($request->title),
            'meta_title' => $request->meta_title,
            'meta_description' => $request->meta_description,
            'icon' => $iconPath,
            'descirption' => $request->description,
        ]);

        return redirect()->route('categories.index')->with('success', 'Kategori başarıyla eklendi!');
    }
   //göstermemizi sağlıyor
    public function show($id)
    {
        return redirect()->route('categories.index');
    }
  //düzenleme için sayfa aç conmpaktı kategoride ara
    public function edit(Category $category)
    {
        return view('admin.categories.edit', compact('category'));
    }
        //güncellemek için kullanıyorum önce belirtik sonra güncellenebilecekleri ayarlayıp tekrar kaydettirip yönlendirme yapılıyo
    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name' => 'required|min:3',
            'slug' => 'nullable|unique:categories,slug,' . $category->id,
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string',
            'icon' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:5120', 
            'description' => 'nullable|string',
        ]);
        if ($request->hasFile('icon')) {
            if ($category->icon) {
                Storage::delete('public/' . $category->icon);
            }
            $directory = storage_path('app/public/category-icons');
            if (!File::exists($directory)) {
                File::makeDirectory($directory, 0777, true);
            }
            $category->icon = $request->file('icon')->store('category-icons', 'public');
        }

        $category->update([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'meta_title' => $request->meta_title,
            'meta_description' => $request->meta_description,
            'icon' => $category->icon,
            'description' => $request->description,
        ]);


        return redirect()->route('categories.index')->with('success', 'Kategori başarıyla güncellendi!');
    }

    public function destroy(Category $category)
    {
        if($category->icon){
            Storage::delete('public/'.$category->icon);
        }
        $category->delete();
        return redirect()->route('categories.index')->with('success', 'Kategori silindi!');
    }
}
