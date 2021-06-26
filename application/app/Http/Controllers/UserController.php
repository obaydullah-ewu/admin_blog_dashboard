<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['title'] = 'Account';
        $data['subtitle'] = 'Account - Profile';
        $data['navAccountActiveClass'] = 'active';
        $data['navAccount'] = 'active-side-menu';
        $data['navBlogActiveClass'] = 'active';
        $data['total_blog'] = count(Blog::where('user_id', Auth::user()->id)->get());
        $data['blogs'] = Blog::where('user_id', Auth::user()->id)->orderBy('created_at', 'DESC')->paginate(5);

        return view('user.profile')->with($data);
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
        //
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
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:30',
            'email' => 'required|max:50',
            'country' => 'required|max:50',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->country = $request->country;
        $user->role_id = $request->role_id;
        if ($request->passward)
        {
            $user->password = Hash::make($request['password']);
        }

        if ($request->hasFile('image')){
//            if (file_exists("application/storage/app/public/blog_images/". $user->image))
//            {
//                unlink("application/storage/app/public/profile_images/". $user->image);
//            }
            // Get filename with the extension
            $filenameWithExt = $request->file('image')->getClientOriginalName();
            // Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just ext
            $extension = $request->file('image')->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore = $filename.time().'.'.$extension;
            // Upload Image
            $path = $request->file('image')->storeAs('public/profile_images', $fileNameToStore);

            $user->image = $fileNameToStore;
        }

        $user->save();

        return redirect()->back()->with('success', 'User updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id)->first();
//        if (file_exists("application/storage/app/public/profile_images/". $user->image))
//        {
//            unlink("application/storage/app/public/profile_images/". $user->image);
//        }

        User::find($id)->delete();

        return redirect()->back()->with('success', 'User deleted successfully');
    }
}
