<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function admin()
    {
        return redirect('/admin/dashboard');        
    }

    public function index()
    {
        return view('admin.index');
    }

    public function user()
    {
        return view('admin.users.user');
    }
}
