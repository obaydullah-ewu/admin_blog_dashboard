<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['title'] = 'Blogs';
        $data['subtitle'] = 'Blog';
        $data['navAllBlogActiveClass'] = 'active';
        $data['blog'] = Blog::orderBy('created_at', 'DESC')->first();
        $data['user'] = User::whereId($data['blog']->user_id)->first();
        $data['blogs'] = Blog::orderBy('created_at', 'DESC')->paginate(20);
        $data['users'] = User::all();

        return view('user.blog')->with($data);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $blog = new Blog();
        $blog->title = $request['title'];
        $blog->description = $request['description'];

        if($request->hasFile('image')){

            // Get filename with the extension
            $filenameWithExt = $request->file('image')->getClientOriginalName();
            // Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just ext
            $extension = $request->file('image')->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore = $filename.time().'.'.$extension;
            // Upload Image
            $path = $request->file('image')->storeAs('public/blog_images', $fileNameToStore);
            $blog->image = $fileNameToStore;
        }


        $blog->user_id = Auth::user()->id;
        $blog->save();
        return redirect()->back()->with('success', 'New post created successfully');
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
        $blog = Blog::find($id);
        $blog->title = $request['title'];
        $blog->description = $request['description'];

        if($request->hasFile('image')){
//            if (file_exists("application/storage/app/public/blog_images/". $blog->image))
//            {
//                unlink("application/storage/app/public/blog_images/". $blog->image);
//            }

            // Get filename with the extension
            $filenameWithExt = $request->file('image')->getClientOriginalName();
            // Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just ext
            $extension = $request->file('image')->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            // Upload Image
            $path = $request->file('image')->storeAs('public/blog_images', $fileNameToStore);
            $blog->image = $fileNameToStore;
        }

        $blog->user_id = Auth::user()->id;
        $blog->save();
        return redirect()->back()->with('success', 'Post Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $blog = Blog::find($id)->first();

//        if (file_exists("application/storage/app/public/blog_images/". $blog->image))
//        {
//            unlink("application/storage/app/public/blog_images/". $blog->image);
//        }

        Blog::find($id)->delete();

        return redirect()->back()->with('success', 'Post deleted successfully');
    }
}
