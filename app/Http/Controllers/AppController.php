<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AppController extends Controller
{
    public function dashboard()
    {
        $total_customers = User::count();
        return view('index', compact('total_customers'));
    }
}
