<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AlertsController extends Controller
{
    public function index()
    {
        return view('pages.alerts');
    }
}
