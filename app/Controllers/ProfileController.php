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

    function index()
    {
        $id = session()->get('user_id');
        $ProfileModel = new ProfileModel();
        $result['datas'] = $ProfileModel->index($id);
        return view('profile/profile', $result);
    }

    public function getData()
    {
        $id = session()->get('user_id');
        $ProfileModel = new ProfileModel();
        $result = $ProfileModel->getData($id);
        $jsonReturn = $this->jsonReturn($result);
        return  $jsonReturn;
        // $data = array(
        //     'status' => true,
        //     'status_text' => "success",
        //     'controller' => "true",
        // );
        // echo json_encode($data);
    }
}
