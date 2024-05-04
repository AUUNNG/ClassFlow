<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\AuthModel;
use App\Models\TeacherModel;

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
        } elseif ($result == null) {
            $data = array(
                'status' => true,
                'status_text' => "row from model empty",
                'controller' => "true",
                'data' => $result,
            );
        } else {
            $data = array(
                'status' => false,
                'status_text' => "failed",
                'controller' => "false",
                'data' => $result,
            );
        }

        header('Content-Type: application/json');
        echo json_encode($data);
    }
    public function jsonReturn2($result)
    {
        if ($result) {
            $data = array(
                'status' => true,
                'status_text' => "success",
                'controller' => "true",
                'model' => $result,

            );
        } elseif ($result == null) {
            $data = array(
                'status' => true,
                'status_text' => "row from model empty",
                'controller' => "true",
                'model' => $result,
            );
        } else {
            $data = array(
                'status' => false,
                'status_text' => "failed",
                'controller' => "false",
                'model' => $result,
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
                        'teacher_id' => $result['datas']->teacher_id,
                        'room' => $result['datas']->room,
                    ]);
                    return json_encode(['status' => true, 'message' => $result['message'], 'datas' => $result['datas']]);
                    // return json_encode(['status' => true, 'message' => $result['message'], 'role' => $result['datas']->role]);
                } else {
                    return json_encode(['status' => false, 'message' => $result['message']]);
                }
                return json_encode(['status' => true, 'message' => 'ok']);
            }
        }
    }

    public function registerForm()
    {
        return view('auth/register');
    }

    public function register()
    {
        $rules = [
            'firstname' => [
                'label' => 'First Name',
                'rules' => 'required',
                'errors' => [
                    'required' => 'กรุณาป้อน {field} ของคุณ'
                ]
            ],
            'lastname' => [
                'label' => 'Last Name',
                'rules' => 'required',
                'errors' => [
                    'required' => 'กรุณาป้อน {field} ของคุณ'
                ]
            ],
            'tel' => [
                'label' => 'New Phone Number',
                'rules' => 'required|numeric|min_length[10]|is_unique[users.tel]',
                'errors' => [
                    'required' => 'กรุณาป้อน {field} ของคุณ',
                    "min_length" => "{field} ต้องมีความยาวอย่างน้อย {param} ตัวอักษร",
                    "numeric" => "กรุณากรอกเฉพาะตัวเลขเท่านั้น",
                    "is_unique" => "{field} ที่คุณป้อนมีผู้ใช้งานรายอื่นใช้ไปแล้ว"
                ]
            ],
            'room' => [
                'label' => 'Room Number',
                'rules' => 'required|numeric',
                'errors' => [
                    'required' => 'กรุณาป้อน {field} ของคุณ',
                    "numeric" => "กรุณากรอกเฉพาะตัวเลขเท่านั้น",
                    "is_unique" => "{field} ที่คุณป้อนมีผู้ใช้งานรายอื่นใช้ไปแล้ว",
                ]
            ],
            'username' => [
                'label' => 'Username',
                'rules' => 'required|min_length[5]|is_unique[users.username]',
                'errors' => [
                    'required' => 'กรุณาป้อน {field} ของคุณ',
                    "min_length" => "{field} ต้องมีความยาวอย่างน้อย {param} ตัวอักษร",
                    "is_unique" => "{field} ที่คุณป้อนมีผู้ใช้งานรายอื่นใช้ไปแล้ว"
                ]
            ],
            'pass' => [
                'label' => 'Password',
                'rules' => 'required|min_length[8]',
                'errors' => [
                    'required' => 'กรุณาป้อน {field} ของคุณ',
                    "min_length" => "{field} ต้องมีความยาวอย่างน้อย {param} ตัวอักษร"
                ]
            ],
            'confirmPass' => [
                'label' => 'Confirm Password',
                'rules' => 'required|matches[pass]',
                'errors' => [
                    "required" => "กรุณาป้อน {field} ของคุณ",
                    "matches" => "{field} ไม่ตรงกับ Password"
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
                unset($request_data['confirmPass']);
                $AuthModel = new AuthModel();
                $result['AuthModel'] = $AuthModel->register($request_data);
                if ($result['AuthModel']) {
                    $request_data['user_id'] = $result['AuthModel'];
                    $TeacherModel = new TeacherModel();
                    $result['TeacherModel'] = $TeacherModel->register($request_data);
                }
                $jsonReturn = $this->jsonReturn($result);
                return  $jsonReturn;
            }
        }
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('login');
    }
}
