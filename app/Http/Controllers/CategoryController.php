<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->search;
        $categories = Category::when($search,function($q,$search){
            return $q->where('name','like',"%$search%");
        })->latest()->paginate(15);
        return view('admin.category.index',compact('categories','search'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required|unique:categories',
        ]);

        $category = new Category();
        $category->name = $request->name;
        $category->slug = Str::slug($request->name);
        $category->status = $request->status;
        $category->save();
        return back()->with('success','New category added.');
    }
    public function update(Request $request)
    {
        $request->validate([
            'name'=>'required|unique:categories,name,'.$request->id,
        ]);

        $category = Category::findOrFail($request->id);
        $category->name = $request->name;
        $category->slug = Str::slug($request->name);
        $category->status = $request->status;
        $category->save();
        return back()->with('success','Category has been updated.');
    }

}
