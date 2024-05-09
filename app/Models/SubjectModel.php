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

    function index()
    {
        $user_id =  session()->get('user_id');
        $db = \Config\Database::connect();
        $query['subjects'] = $db->table('subjects')
            ->select('subjects.subject_id, subjects.subject_code, subjects.subject_name, users.firstname, users.lastname')
            ->join('subjects_access', 'subjects.subject_id = subjects_access.subject_id')
            ->join('users', 'users.user_id = subjects.user_update')
            ->where('subjects_access.user_id', $user_id)
            ->get()
            ->getResult();
        return $query;
    }

    function updateSubjectForm($id)
    {
        $db = \Config\Database::connect();
        $query = $db->table('subjects')
            ->select('subjects.*, users.firstname, users.lastname')
            ->join('users', 'subjects.user_update = users.user_id')
            ->where('subject_id', $id)
            ->get();
        $returnRow = $this->returnList($query);
        return $returnRow;
    }

    function updateSubjectAccessForm($id)
    {
        // $user_id =  session()->get('user_id');
        $db = \Config\Database::connect();
        $query['users'] = $db->table('users')
            ->select('users.user_id, users.firstname, users.lastname')
            ->where('users.role', 'teacher')
            ->get()
            ->getResult();
        $query['subjects_access'] = $db->table('subjects_access')
            ->select('
            subjects_access.subject_id,
            subjects_access.user_update,
            subjects_access.update_date,
            subjects_access.user_id,
            users.firstname,
            users.lastname
             ')
            ->join('users', 'subjects_access.user_id = users.user_id')
            ->where('subjects_access.subject_id', $id)
            ->get()
            ->getResult();
        return $query;
    }

    function test()
    {
        $user_id =  session()->get('user_id');
        $db = \Config\Database::connect();
        $query['subjects'] = $db->table('subjects')
            ->select('subjects.subject_id, subjects.subject_code, subjects.subject_name, users.firstname, users.lastname')
            ->join('subjects_access', 'subjects.subject_id = subjects_access.subject_id')
            ->join('users', 'users.user_id = subjects.user_update')
            ->where('subjects_access.user_id', $user_id)
            ->get()
            ->getResult();
        return $query;
    }

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

    function updateSubject($data)
    {
        $data['user_update'] = session()->get('user_id');
        $datetime = date('Y-m-d H:i:s');
        $data['update_date'] =  $datetime;
        $db = \Config\Database::connect();
        $query = $db->table('subjects')->where('subjects.subject_id', $data['subject_id'])->update($data);
        $returnRow = $this->returnEdit($query);
        return $returnRow;
    }

    function addSubject($data)
    {
        $data['user_update'] = session()->get('user_id');
        $datetime = date('Y-m-d H:i:s');
        $data['create_date'] =  $datetime;
        $db = \Config\Database::connect();
        $db->table('subjects')
            ->insert($data);
        return $db->insertID();
    }

    function addSubjectAccess($datas)
    {
        foreach ($datas as $data) {
        }
        unset($data['subject_code']);
        unset($data['subject_name']);
        $data['user_update'] = session()->get('user_id');
        $data['teacher_id'] = session()->get('teacher_id');
        $datetime = date('Y-m-d H:i:s');
        $data['create_date'] =  $datetime;
        $db = \Config\Database::connect();
        return $db->table('subjects_access')
            ->insert($data);
    }
}
