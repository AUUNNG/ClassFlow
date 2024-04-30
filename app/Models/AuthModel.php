<?php

namespace App\Models;

use CodeIgniter\Model;

class AuthModel extends Model
{
    ////////////////////////////////start เมธอดหลัก ที่สำคัญต้องมี//////////////////////////////////
    ///สำหรับ การ select เท่านั้นนั้น//////////////
    public function returnList($query)
    {
        if ($query) {
            $result = $query->getResult();
            return $result;
        } else {
            return "Error:" . $this->db->error();
        }
    }
    ///สำหรับ การ Insert  เท่านั้นนั้น//////////////
    public function returnInsert($query)
    {
        if ($query) {
            $insertID = $this->db->insertID();
            return $insertID;
        } else {
            return "Error:" . $this->db->error();
        }
    }
    public function returnInsertNoLastId($query)
    {
        if ($query) {
            $result = $query;
            return $result;
        } else {
            return "Error:" . $this->db->error();
        }
    }
    public function returnEdit($query)
    {
        if ($query) {
            $result = $query;
            return $result;
        } else {
            return "Error:" . $this->db->error();
        }
    }
    ////////////////////////////////end เมธอดหลัก ที่สำคัญต้องมี//////////////////////////////////

    public function login($data)
    {
        $db = \Config\Database::connect();
        $query = $db->table('users')->where('username', $data['username'])->get()->getRow();

        if ($query) {
            if (password_verify($data['pass'], $query->pass)) {
                return ['status' => true, 'message' => 'กำลังเข้าสู่ระบบ', 'datas' => $query];
            } else {
                return ['status' => false, 'message' => 'รหัสผ่านไม่ถูกต้อง กรุณาลองอีกครั้ง'];
            }
        } else {
            return ['status' => false, 'message' => 'ไม่พบผู้ใช้ กรุณาตรวจสอบชื่อผู้ใช้ของคุณ'];
        }
        // $datas = array(
        //     'status' => true,
        //     'status_text' => "model ok",
        //     'datas' => password_verify($data['pass'], $query->pass),
        // );
        // return $datas
    }
    
    public function register($data)
    {
        try {
            $datetime = date('Y-m-d H:i:s');
            $data['create_date'] =  $datetime;

            // Hash the password
            $data['pass'] = password_hash($data['pass'], PASSWORD_DEFAULT);
            
            $data['role'] = "teacher";

            $db = \Config\Database::connect();
            $query = $db->table('users')->insert($data);
            $returnRow = $this->returnInsert($query);
            return $returnRow;
        } catch (\CodeIgniter\Database\Exceptions\DatabaseException $e) {
            $result  = array(
                "success" => false,
                "message" => $e->getMessage(),
            );
            return $result;
        }
        // $datas = array(
        //     'status' => true,
        //     'status_text' => "model ok",
        //     'datas' => $data,
        // );
        // return $datas;
    }
}
