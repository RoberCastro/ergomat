<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function admin()
    {
        return view('admin');
    }

    /**
     * Test email
     *
     * @return \Illuminate\Http\Response
     */
    public function testEmail()
    {
        Mail::send('mails.test', array(), function($message)
        {
          $message->to('robertoicastro@gmail.com')->subject('Test');
        });
        return redirect()->back();
    }
}
