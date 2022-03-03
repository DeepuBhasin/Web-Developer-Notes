<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    public function getUserData()
    {
        $subjects = [
            ['subjectName' => 'html', 'marks' => '30'],
            ['subjectName' => 'javascript', 'marks' => '90'],
            ['subjectName' => 'CSS', 'marks' => '60'],
            ['subjectName' => 'PHP', 'marks' => '80'],
            ['subjectName' => 'Database', 'marks' => '70']
        ];
        return $subjects;
    }
    public function getDatabaseData()
    {
        $db1 = \Config\Database::connect();
        //$result = $db1->query('SELECT * FROM user ORDER BY full_name ASC')->getResult();
        $result = $db1->table('user')->get()->getResultArray();
        if (count($result) > 0) {
            return $result;
        } else {
            return [];
        }
    }
    public function saveUserData($data)
    {
        // $db1 = \Config\Database::connect();
        // $builders = $db1->table('user_table');


        // we can use this method as well to connect with database
        $builders = $this->db->table('user_table');     // we are using query builder class
        $res = $builders->insert($data);

        if ($this->db->affectedRows() == 1) {
            return true;
        } else {
            return false;
        }
    }
    public function verifyUnid($id)
    {
        $builders = $this->db->table('user_table');
        $query = $builders->select(['activation_date', 'uni_id', 'status'])->getWhere(['uni_id' => $id]);

        //count($query->getResultArray())
        //$query->resultID->num_rows

        if ($query->resultID->num_rows == 1) {

            return $query->getRow();
        } else {

            return [];
        }
    }
    public function updateStatus($id)
    {
        $builders = $this->db->table('user_table');
        $builders->where(['uni_id' => $id]);
        $builders->update(['status' => 1]);
        if ($this->db->affectedRows()) {
            return  TRUE;
        } else {
            return  FALSE;
        }
    }
}
