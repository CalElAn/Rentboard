<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Property;

class HomeController extends Controller
{
    public function index()
    {
        return view('home', ['property' => Property::latest()->first()]);
    }
}
