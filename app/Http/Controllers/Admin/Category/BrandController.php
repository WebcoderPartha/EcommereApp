<?php

namespace App\Http\Controllers\Admin\Category;

use App\Brand;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Yoeunes\Toastr\Facades\Toastr;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $brands = Brand::all();
        return view('admin.category.brands',compact('brands'));
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
        $data = $request->validate([
           'brand_name' => 'required|unique:brands',
           'brand_logo' => 'required'
        ]);
        $file = $request->file('brand_logo');
        if ($file){
            $brand_name = Str::of(Str::lower($request->brand_name))->slug('-');
            $imgExtention = strtolower($file->getClientOriginalExtension());
            $imgFullname = date('d-m-Y').'-'.$brand_name.'.'.$imgExtention;
            $upload_path = 'media/brand/';
            $image_url = $upload_path.$imgFullname;
            $file->move($upload_path, $imgFullname);

            $data['brand_logo'] = $image_url;

            $brand = new Brand;
            $brand->brand_name = $data['brand_name'];
            $brand->brand_logo = $data['brand_logo'];
            $brand->save();
            Toastr::success($request->brand_name. ' brand added successfully.');
            return redirect()->back();
        }
//        dd($request->all());
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
        $brand = Brand::findOrFail($id);
        return view('admin.category.edit-brand', compact('brand'));
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
        $brand_id = Brand::findOrFail($id);
        $data = $request->validate([
            'brand_name' => 'required|unique:brands,brand_name,'.$brand_id->id.',id'
        ]);

            $file = $request->file('brand_logo');
            if ($file){
                $brand = Brand::findOrFail($id);
                unlink($brand->brand_logo);
                $brand_name = Str::of(Str::lower($request->brand_name))->slug('-');
                $imgExtention = strtolower($file->getClientOriginalExtension());
                $imgFullname = date('d-m-Y').'-'.$brand_name.'.'.$imgExtention;
                $upload_path = 'media/brand/';
                $image_url = $upload_path.$imgFullname;
                $file->move($upload_path, $imgFullname);

                $data['brand_logo'] = $image_url;
                $brand->brand_name = $data['brand_name'];
                $brand->brand_logo = $data['brand_logo'];
                $brand->save();
                Toastr::success($request->brand_name. ' brand updated with logo successfully.');
                return redirect()->route('brands');
            }else{
                $brand = Brand::findOrFail($id);
                $brand->brand_name = $data['brand_name'];
                $brand->save();
                Toastr::success($request->brand_name. ' brand updated without logo successfully.');
                return redirect()->route('brands');
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
        $brand = Brand::findOrFail($id);
        $img_path = $brand->brand_logo;
        if (file_exists($img_path)){
            unlink($img_path);
            $brand->delete();
            Toastr::success($brand->brand_name. ' brand deleted successfully.');
            return redirect()->back();
        }

    }
}
