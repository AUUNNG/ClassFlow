<?php

namespace App\Controllers;

use App\Models\TeacherModel;

class TeacherController extends BaseController
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
        return view('teacher/index');
    }

    public function registerForm()
    {
        return view('teacher/auth/register');
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
            'confirmpass' => [
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
                unset($request_data['confirmpass']);
                $TeacherModel = new TeacherModel();
                $result = $TeacherModel->register($request_data);
                $jsonReturn = $this->jsonReturn($result);
                return  $jsonReturn;
            }
        }

        // $request_data = $this->request->getPost();
        // unset($request_data['confirmpass']);
        // $TeacherModel = new TeacherModel();
        // $result = $TeacherModel->register($request_data);
        // $jsonReturn = $this->jsonReturn($result);
        // return  $jsonReturn;

        // $datas = array(
        //     'status' => true,
        //     'status_text' => "model ok",
        //     'datas' => $request_data,
        // );
        // header('Content-Type: application/json');
        // echo json_encode($datas);
    }
}
