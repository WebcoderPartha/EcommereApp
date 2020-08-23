<?php

namespace App\Http\Controllers\Admin\Category;

use App\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Yoeunes\Toastr\Facades\Toastr;


class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
        return view('admin.category.categories', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
           'category_name' => ['required', 'unique:categories']
        ]);

        $category = new Category;
        $category->category_name = $request->category_name;
        $category->save();
        Toastr::success($request->category_name. ' category added successfully.');
        return redirect()->back();

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::findOrFail($id);
        return view('admin.category.edit-category', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $category = Category::findOrFail($id);
        $this->validate($request,[
           'category_name' => 'required|unique:categories,category_name,'.$category->id.',id'
        ]);
        $category->category_name = $request->category_name;
        if ($category->isDirty('category_name')){
            $category->save();
            Toastr::success($request->category_name. ' category added successfully.');
            return redirect()->route('admin.categories');
        }else{
            Toastr::warning('Nothing to update');
            return redirect()->route('admin.categories');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();

        Toastr::success('Category deleted successfully');
        return redirect()->back();
    }
}
