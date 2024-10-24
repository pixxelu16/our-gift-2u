<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        if (Auth::user()->user_type === 'Customer') {
            return redirect('shop');
        } elseif (Auth::user()->user_type === 'Admin') {
            return redirect('admin/all-orders');
        } elseif (Auth::user()->user_type === 'Company') {
            //check is pable or not
            if(Auth::user()->is_user_payble === 'No'){
                return redirect('company/management-gift-cards');
            } else {
                return redirect('company/corporate-gift-cards');
            }
        } else {
            return view('home');
        }
    }
    
}
