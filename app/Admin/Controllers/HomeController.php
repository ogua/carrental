<?php

namespace App\Admin\Controllers;

use App\Http\Controllers\Controller;
use Encore\Admin\Http\Controllers\Dashboard;
use Encore\Admin\Layout\Column;
use Encore\Admin\Layout\Content;
use Encore\Admin\Layout\Row;
use App\Models\User;
use App\Models\Driver;
use App\Models\Car;
use App\Models\Paystack;
use App\Models\Booking;

class HomeController extends Controller
{
    public function index(Content $content)
    {
        $user = User::all()->count();
        $Driver = Driver::all()->count();
        $Car = Car::all()->count();
        $pd = Paystack::whereDate('created_at', now())->sum('amount');
        $pm = Paystack::whereMonth('created_at', date('m'))->sum('amount');
        $py = Paystack::whereYear('created_at', date('Y'))->sum('amount');

        $tb = Booking::all()->count();

        $tbu = Booking::where('user_id',auth()->user()->id)->get()->count();

        return $content
            ->title('Dashboard')
            ->description('Description...')
            ->view('admin.dashboard',compact('user','Driver','Car','pd','pm','py','tb','tbu'));
    }
}
