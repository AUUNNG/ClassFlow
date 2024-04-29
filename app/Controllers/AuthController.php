<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\AuthModel;

class AuthController extends BaseController
{
    ////////////////////////////////start เมธอดหลัก ที่สำคัญต้องมี//////////////////////////////////

    public function trimString($value)
    {
        if (is_string($value)) {
            return trim($value);
        }
        return $value;
    }
    public function jsonReturn($result)
    {
        if ($result) {
            $data = array(
                'status' => true,
                'status_text' => "success",
                'controller' => "true",
                'data' => $result,

            );
        } else {
            $data = array(
                'status' => false,
                'status_text' => "failed",
                'controller' => "false",
                'datas' => $result,
            );
        }

        header('Content-Type: application/json');
        echo json_encode($data);
    }
    public function root($param)
    {
        $request_data = $this->request->getPost();

        $result = $this->$param($request_data);

        return  $result;
    }
    ////////////////////////////////end เมธอดหลัก ที่สำคัญต้องมี//////////////////////////////////

    public function index()
    {
        // $username = session()->get('username');
        // $role = session()->get('role');
        // print_r($username);
        // print_r($role);
    }

    public function loginForm()
    {
        return view('auth/login');
    }

    public function login()
    {
        $rules = [
            'username' => [
                'label' => 'Username',
                'rules' => 'required',
                'errors' => [
                    'required' => 'กรุณาป้อน {field} ของคุณ'
                ]
            ],
            'pass' => [
                'label' => 'Password',
                'rules' => 'required',
                'errors' => [
                    'required' => 'กรุณาป้อน {field} ของคุณ'
                ]
            ]
        ];

        if ($this->request->getMethod() === 'post') {
            if (!$this->validate($rules)) {
                $errors = $this->validator->getErrors();
                $errorMessage = implode("<br>", $errors);
                return json_encode(['status' => false, 'message' => $errorMessage]);
            } else {
                $request_data = $this->request->getPost();
                $AuthModel = new AuthModel();
                $result = $AuthModel->login($request_data);

                if ($result['status']) {
                    $session = session();
                    $session->set([
                        'isLoggedIn' => true,
                        'user_id' => $result['datas']->user_id,
                        'role' => $result['datas']->role,
                    ]);
                    return json_encode(['status' => true, 'message' => $result['message']]);
                    // return json_encode(['status' => true, 'message' => $result['message'], 'role' => $result['datas']->role]);
                } else {
                    return json_encode(['status' => false, 'message' => $result['message']]);
                }
                return json_encode(['status' => true, 'message' => 'ok']);
            }
        }

        // $username = $this->request->getPost('username');
        // $pass = $this->request->getPost('pass');
        // $request_data = $this->request->getPost();
        // $AuthModel = new AuthModel();
        // $result = $AuthModel->login($request_data);
        // $jsonReturn = $this->jsonReturn($result);
        // return  $jsonReturn;
        // header('Content-Type: application/json');
        // echo json_encode(['status' => true, 'username' => $username, 'pass' => $pass]);
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('login');
    }
}
