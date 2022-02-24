<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SuperAdminController extends Controller
{
    public function dashboard(){
        return view("multiauth::admin.dashboard.main");
    }
    public function profile(){
        return view("multiauth::admin.dashboard.admin.edit");
    }

}
