<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Division;

class UserDivisionController extends Controller
{
    public function index(){
        $data_divisions = Division::all()->sortBy('id');
        return view('userPage.userDashboard', compact('data_divisions'));
    }
}
