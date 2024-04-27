<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class RoleController extends BaseController
{
    public function index()
    {
        //
    }

    public function rolecheck()
    {
        $session = session();
        
        if (!$session->has('role') || $session->get('role') == 'student') {
            return redirect()->to('/student');
        } else if (!$session->has('role') || $session->get('role') == 'teacher') {
            return redirect()->to('/teacher');
        } else if (!$session->has('role') || $session->get('role') == 'admin') {
            return redirect()->to('/dashboard');
        }
    }
}
