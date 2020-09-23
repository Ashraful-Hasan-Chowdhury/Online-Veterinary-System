<?php

namespace App\Http\Controllers\Doctoradmin;

use App\Http\Controllers\Controller;

class HomeController extends Controller
{

    protected $redirectTo = '/doctoradmin/login';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('doctoradmin.auth:doctoradmin');
    }

    /**
     * Show the Doctoradmin dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        return view('doctoradmin.home');
    }

}