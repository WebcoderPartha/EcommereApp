<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\PostCategory;
use Illuminate\Http\Request;
use Yoeunes\Toastr\Facades\Toastr;

class PostCategoryController extends Controller
{

    public function index(){

        $categories = PostCategory::all();
        return view('admin.post.category.index', compact('categories'));

    }

    public function store(Request $request){

        $this->validate($request, [
            'category_name_en'=> 'required|unique:post_categories',
            'category_name_in'=> 'required|unique:post_categories'
        ]);

        $category = new PostCategory;
        $category->category_name_en = $request->category_name_en;
        $category->category_name_in = $request->category_name_in;
        $category->save();

        Toastr::success('Post Category created successfully.');
        return redirect()->back();

    }

    public function edit($id){

        $category = PostCategory::findOrFail($id);
        return view('admin.post.category.edit', compact('category'));

    }

    public function update(Request $request,$id){

        $category = PostCategory::findOrFail($id);
        $this->validate($request, [
            'category_name_en'=> 'required|unique:post_categories,category_name_en,'.$category->id.',id',
            'category_name_in'=> 'required|unique:post_categories,category_name_in,'.$category->id.',id'
        ]);

        $category->category_name_en = $request->category_name_en;
        $category->category_name_in = $request->category_name_in;
        $category->save();

        Toastr::success('Post category updated successfully.');
        return redirect()->route('admin.blog.category.list');

    }

    public function destroy($id){

        $category = PostCategory::findOrFail($id);
        $category->delete();

        Toastr::success('Post category deleted successfully.');
        return redirect()->back();

    }


}
