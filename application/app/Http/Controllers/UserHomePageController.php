<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use const http\Client\Curl\AUTH_ANY;

class UserHomePageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['title'] = 'Dashboard';
        $data['subtitle'] = 'Dashboard';
        $data['navUsersActiveClass'] = 'active';

        $data['user'] = User::find(Auth::user()->id);
        /*Charts*/
        $month_names = ['', 'January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];

        for ($i = 1; $i <= 12; $i++) {
            $monthly_data[@$month_names[$i]] = Blog::where('user_id', Auth::user()->id)->whereMonth('created_at', $i)
                ->count('id');
        }
        $data['day_value'] = [
            [
                'name' => 'Monthly Blog',
                'data' => [
                    ['x' => 'January', 'y' => $monthly_data['January']],
                    ['x' => 'February', 'y' => $monthly_data['February']],
                    ['x' => 'March', 'y' => $monthly_data['March']],
                    ['x' => 'April', 'y' => $monthly_data['April']],
                    ['x' => 'May', 'y' => $monthly_data['May']],
                    ['x' => 'June', 'y' => $monthly_data['June']],
                    ['x' => 'July', 'y' => $monthly_data['July']],
                    ['x' => 'August', 'y' => $monthly_data['August']],
                    ['x' => 'September', 'y' => $monthly_data['September']],
                    ['x' => 'October', 'y' => $monthly_data['October']],
                    ['x' => 'November', 'y' => $monthly_data['November']],
                    ['x' => 'December', 'y' => $monthly_data['December']],
                ]
            ]
        ];
        $data['day_value'] =  json_encode($data['day_value']);
        $data['monthly_data'] = $monthly_data;

        $data['total_blog'] = count(Blog::where('user_id', Auth::user()->id)->get());

        return view('user.dashboard')->with($data);
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
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:30',
            'email' => 'required|max:50',

        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->country = $request->country;
        $user->role_id = $request->role_id;
        $user->password = Hash::make($request['password']);

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

        return redirect()->back()->with('success', 'User created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data['user'] = User::find($id);
        return view('user.dashboard')->with($data);
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
        if ($request['password']){
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

        return redirect()->back()->with('success', 'User created successfully');
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

    public function userList()
    {
        $data['title'] = 'User List';
        $data['subtitle'] = 'User List';
        $data['navUserListActiveClass'] = 'active';
        $data['users'] = User::all();

        return view('admin.user-list')->with($data);
    }
}
