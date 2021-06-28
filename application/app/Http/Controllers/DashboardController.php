<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {

        $data = array();
        $data['pageTitle'] = 'dashboard';
        $data['parentNavDashboard'] = 'menu-item-active';
        $data['title'] = 'Dashboard';
        $data['subtitle'] = 'Dashboard';
        $data['user'] = User::find(Auth::user()->id);
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
        $data['total_blog'] = count(Blog::all());

        return view('admin.dashboard')->with($data);
    }

    public function indexOfToday()
    {

        $data = array();
        $data['pageTitle'] = 'dashboard';
        $data['parentNavDashboard'] = 'menu-item-active';

        $data['title'] = 'Dashboard';
        $data['subtitle'] = 'Dashboard';


        /*Charts*/
        $today_data = Blog::whereRaw('Date(created_at) = CURDATE()')
            ->count('id');

        $data['day_value'] = [
            [
                'name' => 'Daily Sale',
                'data' => [
                    ['x' => '0', 'y' => 0],
                    ['x' => '1', 'y' => $today_data],
                    ['x' => '0', 'y' => 0],
                ]
            ]
        ];
        $data['day_value'] =  json_encode($data['day_value']);
        $data['monthly_data'] = $today_data;

        $data['user'] = User::find(Auth::user()->id);
        $data['total_blog'] = count(Blog::all());
        return view('admin.dashboard')->with($data);
    }

    public function indexOfThisWeek()
    {
        $data = array();
        $data['pageTitle'] = 'dashboard';
        $data['parentNavDashboard'] = 'menu-item-active';
        $data['title'] = 'Dashboard';
        $data['subtitle'] = 'Dashboard';
        $data['user'] = User::find(Auth::user()->id);


        $now = Carbon::now();
        $weekStartDate = $now->startOfWeek()->format('d');
        $weekEndDate = $now->endOfWeek()->format('Y-m-d H:i');

        /*Charts*/
//        $month_names = ['','January2','February','March','April', 'May','June','July','August','September','October','November', 'December'];
        $week_names = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'];

//        for ($i=1;$i<=12;$i++){
//            $monthly_data[@$month_names[$i]] = OrderStore::where('payment_status',1)
//                ->whereMonth('created_at',$i)
//                ->sum('total_amount');
//        }


        for ($i = 0; $i < 7; $i++) {
            $w_date = $weekStartDate + $i;
            $weekly_data[@$week_names[$i]] = Blog::whereDate('created_at', '=', date('Y-m-'.$w_date))
//                ->whereDay('created_at', $i)
//                ->whereDate('created_at', Carbon::now()->subDays($i))
                ->count('id');
        }
        $data['day_value'] = [
            [
                'name' => 'Monthly Blog',
                'data' => [
                    ['x' => 'Monday', 'y' => $weekly_data['Monday']],
                    ['x' => 'Tuesday', 'y' => $weekly_data['Tuesday']],
                    ['x' => 'Wednesday', 'y' => $weekly_data['Wednesday']],
                    ['x' => 'Thursday', 'y' => $weekly_data['Thursday']],
                    ['x' => 'Friday', 'y' => $weekly_data['Friday']],
                    ['x' => 'Saturday', 'y' => $weekly_data['Saturday']],
                    ['x' => 'Sunday', 'y' => $weekly_data['Sunday']],
                ]
            ]
        ];
        $data['day_value'] =  json_encode($data['day_value']);

        $data['monthly_data'] = $weekly_data;

        $data['total_blog'] = count(Blog::all());
        return view('admin.dashboard')->with($data);
    }

    public function indexOfThisMonth()
    {
        $data = array();
        $data['title'] = 'Dashboard';
        $data['subtitle'] = 'Dashboard';
        $data['pageTitle'] = 'dashboard';
        $data['parentNavDashboard'] = 'menu-item-active';
        $data['user'] = User::find(Auth::user()->id);
        /*Charts*/
        $month_dayss = ['', '1', '2', '3', '4', '5', '6', '7', '8', '9', '10', '11', '12','13', '14', '15', '16', '17', '18', '19', '20', '21', '22', '23', '24','25','26','27','28','29','30'];

        for ($i = 1; $i <= 30; $i++) {
            $monthly_data[@$month_dayss[$i]] = Blog::whereDate('created_at', '=', date('Y-m-'.$i))
                ->count('id');
        }
        $data['day_value'] = [
            [
                'name' => 'Monthly Blog',
                'data' => [
                    ['x' => '1', 'y' => $monthly_data['1']],
                    ['x' => '2', 'y' => $monthly_data['2']],
                    ['x' => '3', 'y' => $monthly_data['3']],
                    ['x' => '4', 'y' => $monthly_data['4']],
                    ['x' => '5', 'y' => $monthly_data['5']],
                    ['x' => '6', 'y' => $monthly_data['6']],
                    ['x' => '7', 'y' => $monthly_data['7']],
                    ['x' => '8', 'y' => $monthly_data['8']],
                    ['x' => '9', 'y' => $monthly_data['9']],
                    ['x' => '10', 'y' => $monthly_data['10']],
                    ['x' => '11', 'y' => $monthly_data['11']],
                    ['x' => '12', 'y' => $monthly_data['12']],
                    ['x' => '13', 'y' => $monthly_data['13']],
                    ['x' => '14', 'y' => $monthly_data['14']],
                    ['x' => '15', 'y' => $monthly_data['15']],
                    ['x' => '16', 'y' => $monthly_data['16']],
                    ['x' => '17', 'y' => $monthly_data['17']],
                    ['x' => '18', 'y' => $monthly_data['18']],
                    ['x' => '19', 'y' => $monthly_data['19']],
                    ['x' => '20', 'y' => $monthly_data['20']],
                    ['x' => '21', 'y' => $monthly_data['21']],
                    ['x' => '22', 'y' => $monthly_data['22']],
                    ['x' => '23', 'y' => $monthly_data['23']],
                    ['x' => '24', 'y' => $monthly_data['24']],
                    ['x' => '25', 'y' => $monthly_data['25']],
                    ['x' => '26', 'y' => $monthly_data['26']],
                    ['x' => '27', 'y' => $monthly_data['27']],
                    ['x' => '28', 'y' => $monthly_data['28']],
                    ['x' => '29', 'y' => $monthly_data['29']],
                    ['x' => '30', 'y' => $monthly_data['30']],
                ]
            ]
        ];
        $data['day_value'] =  json_encode($data['day_value']);
        $data['monthly_data'] = $monthly_data;

        $data['total_blog'] = count(Blog::all());

        return view('admin.dashboard')->with($data);
    }

    public function indexOfThisYear()
    {


        $year = date("Y");
        $data = array();
        $data['pageTitle'] = 'dashboard';
        $data['parentNavDashboard'] = 'menu-item-active';
        $data['title'] = 'Dashboard';
        $data['subtitle'] = 'Dashboard';
        $data['user'] = User::find(Auth::user()->id);

        /*Charts*/
        $month_names = ['', 'January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];

        for ($i = 1; $i <= 12; $i++) {
            $monthly_data[@$month_names[$i]] = Blog::whereYear('created_at', $year)
                ->whereMonth('created_at', $i)
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

        $data['total_blog'] = count(Blog::all());
        return view('admin.dashboard')->with($data);
    }
}
