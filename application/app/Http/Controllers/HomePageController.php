<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomePageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user()->role_id == 1)
        {
            $data['title'] = 'Dashboard';
            $data['subtitle'] = 'Dashboard';
            $data['navUsersActiveClass'] = 'active';

            /*Charts*/
            $month_names = ['', 'January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];

            for ($i = 1; $i <= 12; $i++) {
                $monthly_data[@$month_names[$i]] = Blog::whereMonth('created_at', $i)
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




            return view('admin.dashboard')->with($data);
        }elseif (Auth::user()->role_id == 2)
        {
            return redirect()->route('user.index');
        }

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
