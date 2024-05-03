<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ProfileModel;

class ProfileController extends BaseController
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

    // public function rootGet($path = '')
    // {
    //     switch ($path) {
    //         case '':
    //             throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
    //             break;
    //         // case 'general':
    //         //     return $this->generalForm();
    //         //     break;
    //         default:
    //             if (@file_exists(APPPATH . 'Views/profile/' . $path . '.php')) {
    //                 return view('profile/' . $path);
    //             } else {
    //                 throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
    //             }
    //             break;
    //     }
    // }

    public function rootGet($path = '')
    {
        if ($path !== '') {
            if (@file_exists(APPPATH . 'Views/profile/' . $path . '.php')) {
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

    function index()
    {
        return view('profile/profile');
    }

    function general()
    {
        $ProfileModel = new ProfileModel();
        $result['datas'] = $ProfileModel->getDataById();
        return view('profile/general', $result);
    }

    function tel()
    {
        return view('profile/tel');
    }

    function password()
    {
        return view('profile/password');
    }

    public function updateGeneral()
    {
        $ProfileModel = new ProfileModel();
        $result['oldData'] = $ProfileModel->getDataById();
        $request_data = $this->request->getPost();

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
                'rules' => 'required|numeric',
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
        ];

        if ($this->request->getMethod() === 'post') {
            if (
                $request_data['firstname'] === $result['oldData'][0]->firstname &&
                $request_data['lastname'] === $result['oldData'][0]->lastname &&
                $request_data['username'] === $result['oldData'][0]->username
            ) {
                $data = array(
                    'status' => true,
                );
                echo json_encode($data);
            } else {
                if (!$this->validate($rules)) {
                    $errors = $this->validator->getErrors();
                    $errorMessage = implode("<br>", $errors);
                    return json_encode(['status' => false, 'message' => $errorMessage]);
                } else {
                    $result = $ProfileModel->updateGeneral($request_data);
                    $jsonReturn = $this->jsonReturn2($result);
                    return  $jsonReturn;
                }
            }
        }
        // $data = array(
        //     'status' => true,
        //     'status_text' => "success",
        //     'controller' => "true",
        // );
        // echo json_encode($data);
    }

    public function updateTel()
    {
        $ProfileModel = new ProfileModel();
        $result['oldData'] = $ProfileModel->getDataById();
        $request_data = $this->request->getPost();

        $rules = [
            'currentTel' => [
                'label' => 'Current Phone Number',
                'rules' => 'required|numeric|matches[users.tel]',
                'errors' => [
                    'required' => 'กรุณาป้อน {field} ของคุณ',
                    "numeric" => "กรุณากรอกเฉพาะตัวเลขเท่านั้น",
                    "min_length" => "{field} ต้องมีความยาวอย่างน้อย {param} ตัวอักษร",
                    "matches" => "{field} ไม่ถูกต้อง",
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
        ];

        if ($this->request->getMethod() === 'post') {
            if (!$this->validate($rules)) {
                $errors = $this->validator->getErrors();
                $errorMessage = implode("<br>", $errors);
                return json_encode(['status' => false, 'message' => $errorMessage]);
            } else {
                unset($request_data['currentTel']);
                $result = $ProfileModel->updateTel($request_data);
                $jsonReturn = $this->jsonReturn2($result);
                return  $jsonReturn;
            }
        }
        // $data = array(
        //     'status' => true,
        //     'status_text' => "success",
        //     'controller' => "true",
        // );
        // echo json_encode($request_data['tel']);
    }

    public function updatePass()
    {
        $ProfileModel = new ProfileModel();
        $result['oldData'] = $ProfileModel->getDataById();
        $request_data = $this->request->getPost();

        $rules = [
            'currentTel' => [
                'label' => 'Current Phone Number',
                'rules' => 'required|numeric|matches[users.tel]',
                'errors' => [
                    'required' => 'กรุณาป้อน {field} ของคุณ',
                    "numeric" => "กรุณากรอกเฉพาะตัวเลขเท่านั้น",
                    "min_length" => "{field} ต้องมีความยาวอย่างน้อย {param} ตัวอักษร",
                    "matches" => "{field} ไม่ถูกต้อง",
                ]
            ],
            'currentPass' => [
                'label' => 'Current Password',
                'rules' => 'required|numeric|matches[users.pass]',
                'errors' => [
                    'required' => 'กรุณาป้อน {field} ของคุณ',
                    "numeric" => "กรุณากรอกเฉพาะตัวเลขเท่านั้น",
                    "min_length" => "{field} ต้องมีความยาวอย่างน้อย {param} ตัวอักษร",
                    "matches" => "{field} ไม่ถูกต้อง",
                ]
            ],
            'pass' => [
                'label' => 'Password',
                'rules' => 'required|numeric|min_length[10]',
                'errors' => [
                    'required' => 'กรุณาป้อน {field} ของคุณ',
                    "numeric" => "กรุณากรอกเฉพาะตัวเลขเท่านั้น",
                    "min_length" => "{field} ต้องมีความยาวอย่างน้อย {param} ตัวอักษร",
                ]
            ],
            'confirmPass' => [
                'label' => 'Confirm Password',
                'rules' => 'required|matches[pass]',
                'errors' => [
                    "required" => "กรุณาป้อน {field} ของคุณ",
                    "matches" => "{field} ไม่ตรงกับ Password"
                ]
            ],
        ];

        if ($this->request->getMethod() === 'post') {
            if (!$this->validate($rules)) {
                $errors = $this->validator->getErrors();
                $errorMessage = implode("<br>", $errors);
                return json_encode(['status' => false, 'message' => $errorMessage]);
            } else {
                // unset($request_data['currentTel']);
                // $result = $ProfileModel->updateTel($request_data);
                // $jsonReturn = $this->jsonReturn2($result);
                // return  $jsonReturn;
            }
        }
        // $data = array(
        //     'status' => true,
        //     'status_text' => "success",
        //     'controller' => "true",
        // );
        // echo json_encode($request_data['tel']);
    }
}
