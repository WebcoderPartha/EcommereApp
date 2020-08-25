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

    public function index()
    {
        $products = Product::with(['category', 'brand', 'subcategory'])->orderBy('id', 'DESC')->get();
//        return response()->json($products);

        return view('admin.product.index', compact('products'));

    }
    // SubCategory AJAX
    public function getSubcategory($category_id){
        $subcat = SubCategory::where('category_id',$category_id)->get();

        return json_encode($subcat);
    }


    public function create()
    {
        $categories = Category::all();
        $sub_categories = SubCategory::all();
        $brands = Brand::all();
        return view('admin.product.create', compact('categories', 'sub_categories', 'brands'));
    }


    public function store(Request $request)
    {
        $this->validate($request, [
           'category_id' => 'required',
           'brand_id' => 'required',
           'product_name' => 'required|unique:products',
           'product_code' => 'required|unique:products',
           'product_quantity' => 'required',
           'product_details' => 'required',
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
       $data['discount_price'] = $request->discount_price;
       $data['video_link'] = $request->video_link;
       $data['main_slider'] = $request->main_slider;
       $data['hot_deal'] = $request->hot_deal;
       $data['best_rated'] = $request->best_rated;
       $data['mid_slider'] = $request->mid_slider;
       $data['hot_new'] = $request->hot_new;
       $data['buyone_getone'] = $request->buyone_getone;
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
           return redirect()->route('admin.product.all');


       }


    }

    public function show($id)
    {
        $product = Product::findOrFail($id);
        return view('admin.product.show', compact('product'));
    }


    public function edit($id)
    {

        $product = Product::findOrFail($id);
        $categories = Category::all();
        $subcategories = SubCategory::all();
        $brands = Brand::all();
        return view('admin.product.edit', compact('product','categories','brands', 'subcategories'));
    }


    public function update(Request $request, $id)
    {

        $product = Product::findOrFail($id);

        $this->validate($request, [
            'category_id' => 'required',
            'brand_id' => 'required',
            'product_name' => 'required|unique:products,product_name,'.$product->id.',id',
            'product_code' => 'required|unique:products,product_code,'.$product->id.',id',
            'product_quantity' => 'required',
            'product_details' => 'required',
            'selling_prize' => 'required',
            'status' => 'required',
        ]);

//        $data['discount_price'] = $request->discount_price;
        $product['category_id'] = $request->category_id;
        $product['subcategory_id'] = $request->subcategory_id;
        $product['brand_id'] = $request->brand_id;
        $product['product_name'] = $request->product_name;
        $product['product_code'] = $request->product_code;
        $product['product_quantity'] = $request->product_quantity;
        $product['product_details'] = $request->product_details;
        $product['product_color'] = $request->product_color;
        $product['product_size'] = $request->product_size;
        $product['selling_prize'] = $request->selling_prize;
        $product['discount_price'] = $request->discount_price;
        $product['video_link'] = $request->video_link;
        $product['main_slider'] = $request->main_slider;
        $product['hot_deal'] = $request->hot_deal;
        $product['best_rated'] = $request->best_rated;
        $product['mid_slider'] = $request->mid_slider;
        $product['hot_new'] = $request->hot_new;
        $product['buyone_getone'] = $request->buyone_getone;
        $product['trend'] = $request->trend;
        $product['status'] = $request->status;

        $image1 = $request->file('image_one');
        $image2 = $request->file('image_two');
        $image3 = $request->file('image_three');

        // Product Title
        $img_title = Str::of(Str::lower($request->product_name))->slug('-');

        if ($image1){

            // exist image path
            $exist_img1 = public_path($product->image_one);

            // Remove exist image
            if (file_exists($exist_img1)) {
                unlink($exist_img1);
            }

            // Make Image name For Image 1
            $img_one_name = hexdec(uniqid()).'-'.$img_title.'.'.$image1->getClientOriginalExtension();
            Image::make($image1)->resize(300, 300)->save(public_path('media/products/'.$img_one_name));
            $product['image_one'] = 'media/products/'.$img_one_name;

        }

        if ($image2)
        {
            // exist image path
            $exist_img2 = public_path($product->image_two);

            // Remove exist image
            if (file_exists($exist_img2)) {
                unlink($exist_img2);
            }

            // Make Image name For Image 2
            $img_two_name = hexdec(uniqid()).'-'.$img_title.'.'.$image2->getClientOriginalExtension();
            Image::make($image2)->resize(300, 300)->save(public_path('media/products/'.$img_two_name));
            $product['image_two'] = 'media/products/'.$img_two_name;

        }

        if ($image3){

            // exist image path
            $exist_img3 = public_path($product->image_three);

            // Remove exist image
            if (file_exists($exist_img3)) {
                unlink($exist_img3);
            }

            // Make Image name For Image 3
            $img_three_name = hexdec(uniqid()).'-'.$img_title.'.'.$image3->getClientOriginalExtension();
            Image::make($image3)->resize(300, 300)->save(public_path('media/products/'.$img_three_name));
            $product['image_three'] = 'media/products/'.$img_three_name;

        }

        if ($product->isDirty('category_id') || $product->isDirty('buyone_getone') || $product->isDirty('subcategory_id') || $product->isDirty('brand_id') || $product->isDirty('product_name') || $product->isDirty('product_code') || $product->isDirty('product_quantity') || $product->isDirty('product_details') || $product->isDirty('product_color') || $product->isDirty('product_size') || $product->isDirty('selling_prize') || $product->isDirty('discount_price') || $product->isDirty('main_slider') || $product->isDirty('hot_deal') || $product->isDirty('best_rated') || $product->isDirty('mid_slider') || $product->isDirty('hot_new') || $product->isDirty('trend') || $product->isDirty('status') || $product->isDirty('image_one') || $product->isDirty('image_two') || $product->isDirty('image_three') || $product->isDirty('name')){

            $product->save();

            Toastr::success('Product updated successfully');
            return redirect()->route('admin.product.all');

        }else{

            Toastr::warning('Product not updated');
            return redirect()->route('admin.product.all');

        }

    }

    public function active_product($id){

        $product = Product::findOrFail($id);
        $product->status = 1;
        $product->save();

        Toastr::success('Product active successfully');
        return redirect()->back();

    }

    public function inactive_product($id){

        $product = Product::findOrFail($id);
        $product->status = 0;
        $product->save();

        Toastr::success('Product inactive successfully');
        return redirect()->back();

    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);

        $img_path1 = public_path($product->image_one);
        $img_path2 = public_path($product->image_two);
        $img_path3 = public_path($product->image_three);

        if (file_exists($img_path1) && file_exists($img_path2) && file_exists($img_path3)){

            unlink($img_path1);
            unlink($img_path2);
            unlink($img_path3);

            $product->delete();

            Toastr::success('Product deleted successfully.');
            return redirect()->back();

        }

    }
}
