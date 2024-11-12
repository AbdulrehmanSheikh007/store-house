<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\Categories;
use App\Models\Products;
use App\Models\User;

class HomeController extends Controller {

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index() {
        $productCount = number_format(Products::count());
        $categoryCount = number_format(Categories::count());
        $userCount = number_format(User::count());
        $currentYear = now()->year;

        $productsByMonth = Products::selectRaw('MONTH(created_at) as month, count(*) as product_count')
                ->whereYear('created_at', $currentYear)
                ->groupBy(DB::raw('MONTH(created_at)'))
                ->orderBy(DB::raw('MONTH(created_at)'))
                ->get();

        $graphData = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
        foreach ($productsByMonth as $data) {
            $graphData[$data->month - 1] = $data->product_count;
        }
        
        return view('dashboard.dashboard', compact(['productCount', 'categoryCount', 'userCount', 'graphData']));
    }

}
