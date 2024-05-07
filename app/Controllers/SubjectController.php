<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\SubjectModel;

class SubjectController extends BaseController
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

    public function rootGet($path = '')
    {
        if ($path !== '') {
            if (@file_exists(APPPATH . 'Views/subject/' . $path . '.php')) {
                // Get the last segment of the URL which should be the ID
                $uri = service('uri');
                $id = $uri->getSegment(3); // Assuming '486' is the third segment in the URL
                if ($id) {
                    $result = $this->$path($id); // Pass the id parameter here
                } else {
                    $result = $this->$path();
                }
                return $result;
            } else {
                throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
            }
        } else {
            echo 'Page Not Found.';
        }
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
        $SubjectModel = new SubjectModel();
        $result['subjects'] = $SubjectModel->index();
        return view('subject/subject', $result);
    }

    public function test($id)
    {
        $SubjectModel = new SubjectModel();
        $result['datas'] = $SubjectModel->test($id);
        $jsonReturn = $this->jsonReturn($result);
        return  $jsonReturn;
    }

    public function addSubject()
    {
        $request_data = $this->request->getPost();
        $SubjectModel = new SubjectModel();
        $result['addSubject'] = $SubjectModel->addSubject($request_data);
        $request_data['subject_id'] = $result['addSubject'];
        $result['addSubjectAccess'] = $SubjectModel->addSubjectAccess($request_data);
        // $jsonReturn = $this->jsonReturn($result);
        return json_encode($result);
    }

    public function updateSubjectForm($id)
    {
        $SubjectModel = new SubjectModel();
        $result = $SubjectModel->updateSubjectForm($id);
        $jsonReturn = $this->jsonReturn($result);
        return  $jsonReturn;
    }

    public function updateSubject()
    {
        $request_data = $this->request->getPost();
        $SubjectModel = new SubjectModel();
        $result = $SubjectModel->updateSubject($request_data);
        $jsonReturn = $this->jsonReturn($result);
        return  $jsonReturn;
    }

    public function updateSubjectAccessForm($id)
    {
        $SubjectModel = new SubjectModel();
        $result = $SubjectModel->updateSubjectAccessForm($id);
        $jsonReturn = $this->jsonReturn($result);
        return  $jsonReturn;
    }

    public function updateSubjectAccess()
    {
        $request_data = $this->request->getPost();
        return json_encode($request_data);
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
                'label' => 'Phone Number',
                'rules' => 'required|min_length[10]|is_unique[users.tel]',
                'errors' => [
                    'required' => 'กรุณาป้อน {field} ของคุณ',
                    "min_length" => "{field} ต้องมีความยาวอย่างน้อย {param} ตัวอักษร",
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
                $SubjectModel = new SubjectModel();
                $result = $SubjectModel->register($request_data);
                $jsonReturn = $this->jsonReturn($result);
                return $jsonReturn;
            }
        }

        // $request_data = $this->request->getPost();
        // unset($request_data['confirmPass']);
        // $SubjectModel = new SubjectModel();
        // $result = $SubjectModel->register($request_data);
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
