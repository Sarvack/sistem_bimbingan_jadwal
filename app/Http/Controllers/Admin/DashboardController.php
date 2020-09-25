<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Admin;
use App\Users;

class DashboardController extends Controller
{
    public function index(Users $user)
    {
        return view('admins.dashboard.index', compact('user'));
    }

    public function profileAdmin(Users $user)
    {
        return view('admins.profile.index', compact('user'));
    }
    // public function index()
    // {
    //     $this->data['users'] = Users::all();

    //     $this->data['admins'] = Admin::orderBy('nama', 'ASC')->paginate(10);

    //     return view('admins.register.index', $this->data);
    // }
}
