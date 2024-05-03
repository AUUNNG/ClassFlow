<?php

namespace App\Models;

use CodeIgniter\Model;

class TeacherModel extends Model
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

    function getDataByUserId()
    {
        $user_id =  session()->get('user_id');
        $db = \Config\Database::connect();
        return $db->table('teachers')
            ->where('teachers.user_id', $user_id)
            ->get()
            ->getResult();
    }

    function getRowByUserId()
    {
        $user_id =  session()->get('user_id');
        $db = \Config\Database::connect();
        return $db->table('teachers')
            ->where('teachers.user_id', $user_id)
            ->get()
            ->getNumRows();
    }

    function register($data)
    {
        unset($data['firstname']);
        unset($data['lastname']);
        unset($data['username']);
        unset($data['tel']);
        unset($data['pass']);
        $datetime = date('Y-m-d H:i:s');
        $data['create_date'] =  $datetime;
        $db = \Config\Database::connect();
        $db->table('teachers')
            ->insert($data);
        $returnRow = $this->returnInsert($db);
        return $returnRow;
        // $datas = array(
        //     'status' => true,
        //     'status_text' => "model teachermodel ok",
        //     'datas' => $data,
        // );
        // return $datas;
    }

    function updateTeacher()
    {
        $user_id =  session()->get('user_id');
        $db = \Config\Database::connect();
        return $db->table('teachers')
            ->where('teachers.user_id', $user_id)
            ->get()
            ->getNumRows();
    }
}
