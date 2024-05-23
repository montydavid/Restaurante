<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Customer;
use App\Models\Order;
use Carbon\Carbon;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $productCount = Product::where('status', '=', '1')->count();
        $customerCount = Customer::where('status', '=', '1')->count();
        $dateOrder = Carbon::now();
        $dateOrder = $dateOrder->format('Y-m-d');
        $saleCountDay = Order::whereDate('dateOrder', '=', Carbon::now()->format('Y-m-d'))->get()->count("id");
        $saleTotalDay = Order::whereDate('dateOrder', '=', Carbon::now()->format('Y-m-d'))->sum("total");
        $saleCountMonth = Order::whereMonth('dateOrder', date('m'))->get()->count("id");
        $saleTotalMonth = Order::whereMonth('dateOrder', date('m'))->sum("total");
        return view('home', compact('productCount', 'customerCount', 'saleCountDay', 'saleTotalDay', 'saleCountMonth', 'saleTotalMonth'));
    }
}
