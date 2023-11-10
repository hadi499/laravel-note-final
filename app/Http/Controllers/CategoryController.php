<?php

namespace App\Http\Controllers;


use App\Models\Category;
use Illuminate\Http\Request;


class CategoryController extends Controller
{

    public function index()
    {
        return view('category.index', [
            'categories' => Category::all(),
            'active' => 'category'
        ]);
    }
    public function getCategoryBySlug($slug)
    {
        $categories = Category::where('slug', $slug)->where('user_id', auth()->user()->id)->get();

        return view('category.show', [
            'categories' => $categories,
            'notes' => $categories->pluck('notes')->collapse(),
            'active' => '',
            'slug' => $slug
        ]);
    }
    public function create()
    {
        return view('category.create', [
            'active' => ''
        ]);
    }

    public function store(Request $request)
    {

        $validatedData = $request->validate([
            'name' => 'required',
            'slug' => 'required|unique:categories'
        ]);

        $validatedData['user_id'] = auth()->user()->id;
        Category::create($validatedData);

        return redirect('/category')->with('success', 'New category added!');
    }
}
