<?php 


require_once ('DB/MysqliDb.php');

class DB 
{
    protected $db;

    public function connect()
    {
        $this->db = new MysqliDb (DB_HOST, DB_USER, DB_PASS, DB_NAME);
        if(!$this->db)
            die("Connection Error : ");
        return $this->db;
    }

    public function searchUsers($searchQuery)
    {
        $searchQuery = '%' . $searchQuery . '%';

        $this->db->where('id', $searchQuery, 'LIKE');
        $this->db->orWhere('name', $searchQuery, 'LIKE');
        $this->db->orWhere('position', $searchQuery, 'LIKE');
        $this->db->orWhere('department', $searchQuery, 'LIKE');
        $this->db->orWhere('phone_number', $searchQuery, 'LIKE');
        $this->db->orWhere('start_date', $searchQuery, 'LIKE');
        $this->db->orWhere('end_date', $searchQuery, 'LIKE');
        $this->db->orWhere('status', $searchQuery, 'LIKE');

        return $this->db->get('users');
    }


}