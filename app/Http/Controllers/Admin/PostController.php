<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Post;
use App\PostCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;
use Yoeunes\Toastr\Facades\Toastr;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();
        return view('admin.post.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $categories = PostCategory::all();
        return view('admin.post.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request,[
            'postcategory_id' => 'required',
            'post_title_en'   => 'required|unique:posts',
            'post_title_in'   => 'required|unique:posts',
            'details_en'      => 'required',
            'details_in'      => 'required',
//            'post_image'      => 'required',
        ]);

        $post = new Post;
        $post->postcategory_id = $request->postcategory_id;
        $post->post_title_en   = $request->post_title_en;
        $post->post_title_in   = $request->post_title_in;
        $post->details_en      = $request->details_en;
        $post->details_in      = $request->details_in;

        $image = $request->file('post_image');

        if ($image){

            $title = Str::of(Str::lower($request->post_title_en))->slug('-');

            $image_name = $title.'.'.$image->getClientOriginalExtension();

            Image::make($image)->resize(800, 600)->save(public_path('media/post/'.$image_name));

            $post->post_image = 'media/post/'.$image_name;

            $post->save();

            Toastr::success('Post has been added successfully');
            return redirect()->route('admin.blog.list');

        }else{

            Toastr::error('Without Image not added');
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

        $post = Post::findOrFail($id);
        $categories = PostCategory::all();
        return view('admin.post.edit', compact('post', 'categories'));

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

        $post = Post::findOrFail($id);
        $this->validate($request, [
            'postcategory_id' => 'required',
            'post_title_en' => 'required|unique:posts,post_title_en,' . $post->id . ',id',
            'post_title_in' => 'required|unique:posts,post_title_in,' . $post->id . ',id',
            'details_en' => 'required',
            'details_in' => 'required',
//            'post_image'      => 'required',
        ]);

        $post->postcategory_id = $request->postcategory_id;
        $post->post_title_en = $request->post_title_en;
        $post->post_title_in = $request->post_title_in;
        $post->details_en = $request->details_en;
        $post->details_in = $request->details_in;

        $image = $request->file('post_image');

        if ($image) {

            // Remove Old Image
            $old_img = public_path($post->post_image);
            if (file_exists($old_img)){
                unlink($old_img);
            }

            $title = Str::of(Str::lower($request->post_title_en))->slug('-');

            $image_name = $title . '.' . $image->getClientOriginalExtension();

            Image::make($image)->resize(800, 600)->save(public_path('media/post/' . $image_name));

            $post->post_image = 'media/post/' . $image_name;

        }

        if ($post->isDirty('postcategory_id') || $post->isDirty('post_title_en') || $post->isDirty('post_title_in') || $post->isDirty('details_en') || $post->isDirty('details_in') || $post->isDirty('post_image')){

            $post->save();
            Toastr::success('Post has been added successfully');
            return redirect()->route('admin.blog.list');

        }else{

            Toastr::warning('Post not updated');
            return redirect()->route('admin.blog.list');

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

        $post = Post::findOrFail($id);

        $old_img = public_path($post->post_image);

        if (file_exists($old_img)) {

            unlink($old_img);
            $post->delete();

            Toastr::success('Post has been deleted successfully.');
            return redirect()->back();

        }

    }
}
