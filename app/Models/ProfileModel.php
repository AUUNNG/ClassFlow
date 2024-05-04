<?php

namespace App\Models;

use CodeIgniter\Model;

class ProfileModel extends Model
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

    function general()
    {
        $user_id =  session()->get('user_id');
        $db = \Config\Database::connect();
        return $db->table('users')
            ->where('users.user_id', $user_id)
            ->get()
            ->getResult();
    }

    function getDataById()
    {
        $user_id =  session()->get('user_id');
        $db = \Config\Database::connect();
        return $db->table('users')
            ->where('users.user_id', $user_id)
            ->get()
            ->getResult();
    }

    function updateGeneral($data)
    {
        unset($data['room']);
        $user_id =  session()->get('user_id');
        $data['user_update'] =  $user_id;
        $update_date = date('Y-m-d H:i:s');
        $data['update_date'] =  $update_date;
        $db = \Config\Database::connect();
        return $db->table('users')
            ->where('users.user_id', $user_id)
            ->update($data);
    }

    function updateTel($data)
    {
        // $data['user_id'] =  session()->get('user_id');
        $user_id =  session()->get('user_id');
        $data['user_update'] =  $user_id;
        $update_date = date('Y-m-d H:i:s');
        $data['update_date'] =  $update_date;
        $db = \Config\Database::connect();
        return $db->table('users')
            ->where('users.user_id', $user_id)
            ->update($data);
    }
}
