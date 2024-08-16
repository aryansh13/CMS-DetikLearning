<?php

namespace App\Http\Controllers;

use App\Models\Division;
use Illuminate\Http\Request;

class DivisionController extends Controller
{
    public function index(){
        $data_divisions = Division::all()->sortBy('id');
        return view('adminPage.division', compact('data_divisions'));
    }
}
