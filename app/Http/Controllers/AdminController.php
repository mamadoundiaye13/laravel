<?php
/**
 * Created by PhpStorm.
 * User: junior
 * Date: 16/11/18
 * Time: 17:39
 */

namespace App\Http\Controllers;


class AdminController extends Controller
{
    protected $guard = 'admin';

    /**
     * Create a new controller instance.
     *
     * @return void
     *
     */

    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('admin');
    }
}
