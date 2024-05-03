<?php

namespace App\Models;

use CodeIgniter\Model;

class SubjectModel extends Model
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
    
    function getDataById()
    {
        $user_id =  session()->get('user_id');
        $db = \Config\Database::connect();
        return $db->table('teachers')
            ->where('teachers.user_id', $user_id)
            ->get()
            ->getResult();
    }
    
    function getRowById()
    {
        $user_id =  session()->get('user_id');
        $db = \Config\Database::connect();
        return $db->table('teachers')
            ->where('teachers.user_id', $user_id)
            ->get()
            ->getNumRows();
    }
}