<?php

namespace App\Http\Controllers\Admin\Product;

use App\Brand;
use App\Category;
use App\Http\Controllers\Controller;
use App\Product;
use App\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;
use Yoeunes\Toastr\Facades\Toastr;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product = Product::all();
        return view('admin.product.index', compact('product'));
    }
    // SubCategory AJAX
    public function getSubcategory($category_id){
        $subcat = SubCategory::where('category_id',$category_id)->get();

        return json_encode($subcat);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $sub_categories = SubCategory::all();
        $brands = Brand::all();
        return view('admin.product.create', compact('categories', 'sub_categories', 'brands'));
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
           'category_id' => 'required',
           'brand_id' => 'required',
           'product_name' => 'required|unique:products',
           'product_code' => 'required|unique:products',
           'product_quantity' => 'required',
           'product_details' => 'required',
           'product_color' => 'required',
           'selling_prize' => 'required',
           'image_one' => 'required',
           'image_two' => 'required',
           'image_three' => 'required',
           'status' => 'required',
        ]);
//        $data['discount_price'] = $request->discount_price;
       $data['category_id'] = $request->category_id;
       $data['subcategory_id'] = $request->subcategory_id;
       $data['brand_id'] = $request->brand_id;
       $data['product_name'] = $request->product_name;
       $data['product_code'] = $request->product_code;
       $data['product_quantity'] = $request->product_quantity;
       $data['product_details'] = $request->product_details;
       $data['product_color'] = $request->product_color;
       $data['product_size'] = $request->product_size;
       $data['selling_prize'] = $request->selling_prize;
       $data['video_link'] = $request->video_link;
       $data['main_slider'] = $request->main_slider;
       $data['hot_deal'] = $request->hot_deal;
       $data['best_rated'] = $request->best_rated;
       $data['mid_slider'] = $request->mid_slider;
       $data['hot_new'] = $request->hot_new;
       $data['trend'] = $request->trend;
       $data['status'] = $request->status;

       $image1 = $request->file('image_one');
       $image2 = $request->file('image_two');
       $image3 = $request->file('image_three');
       if ($image1 && $image2 && $image3){

           // Product Title
           $img_title = Str::of(Str::lower($request->product_name))->slug('-');

           // Make Image name For Image 1
           $img_one_name = hexdec(uniqid()).'-'.$img_title.'.'.$image1->getClientOriginalExtension();
           Image::make($image1)->resize(300, 300)->save(public_path('media/products/'.$img_one_name));
           $data['image_one'] = 'media/products/'.$img_one_name;

           // Make Image name For Image 2
           $img_two_name = hexdec(uniqid()).'-'.$img_title.'.'.$image2->getClientOriginalExtension();
           Image::make($image2)->resize(300, 300)->save(public_path('media/products/'.$img_two_name));
           $data['image_two'] = 'media/products/'.$img_two_name;

           // Make Image name For Image 3
           $img_three_name = hexdec(uniqid()).'-'.$img_title.'.'.$image3->getClientOriginalExtension();
           Image::make($image3)->resize(300, 300)->save(public_path('media/products/'.$img_three_name));
           $data['image_three'] = 'media/products/'.$img_three_name;

           Product::create($data);

           Toastr::success('Product added successfully');
           return redirect()->back();


       }




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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
