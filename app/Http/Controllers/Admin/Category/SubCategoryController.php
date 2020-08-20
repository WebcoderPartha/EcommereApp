<?php

namespace App\Http\Controllers\Admin\Category;

use App\Category;
use App\Http\Controllers\Controller;
use App\SubCategory;
use Illuminate\Http\Request;
use Yoeunes\Toastr\Facades\Toastr;

class SubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
        $sub_categories = SubCategory::all();
//        dd($sub_categories);
        return view('admin.category.sub-category', compact('categories','sub_categories'));
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
            'subcategory_name' => 'required|unique:sub_categories',
            'category_id'      => 'required'
        ]);

        $subcategory = new SubCategory;
        $subcategory->subcategory_name = $request->subcategory_name;
        $subcategory->category_id = $request->category_id;
        $subcategory->save();

        Toastr::success($request->subcategory_name.' subcategory added successfully');
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
//        $categories = Category::pluck('');
        $categories = Category::all();
        $sub_category = SubCategory::findOrFail($id);
//        dd($categories);
        return view('admin.category.edit-subcategory', compact('categories', 'sub_category'));
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

        $subcategory = SubCategory::findOrFail($id);
        $this->validate($request, [
            'subcategory_name' => 'required|unique:sub_categories,subcategory_name,'.$subcategory->id.',id',
            'category_id'      => 'required'
        ]);

        $subcategory->subcategory_name = $request->subcategory_name;
        $subcategory->category_id = $request->category_id;

        // checking data updated or not
        if ($subcategory->isDirty(['subcategory_name', 'category_id'])){

            $subcategory->save();
            Toastr::success($request->subcategory_name.' subcategory updated successfully');
            return redirect()->route('subcategory.list');

        }else{
            //
            Toastr::warning('Nothing to updated');
            return redirect()->route('subcategory.list');

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
        $sub_category = SubCategory::where('id', $id)->first();
        $sub_category->delete();
        Toastr::success($sub_category->subcategory_name.' subcategory deleted successfully');
        return redirect()->back();
    }
}
