<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(){
        $categories = Category::all();
        return view('categories', compact('categories'));
    }

    public function create(){
        return view('category_create');
    }

    public function store(Request $request){
        $request->validate([
            'name' => 'required',
        ]);

        $validatedData = $request->only(['name']);

        $category = new Category();
        $category->fill($validatedData);
        $category->save();

        return redirect('/');
    }

    public function destroy($id){
        $category = Category::find($id);
        if($category){
            $category->delete();
            return redirect('/');
        }
        return "Category not found!";
    }
}
