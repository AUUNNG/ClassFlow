<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class IndexController extends BaseController
{
    public function index()
    {
        echo session()->get('isLoggedIn') . "<br>";
        echo session()->get('user_id') . "<br>";
        echo session()->get('role') . "<br>";
        echo session()->get('teacher_id') . "<br>";
        echo session()->get('room') . "<br>";
        return view('index');
    }
}
