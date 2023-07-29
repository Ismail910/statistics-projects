<?php 




class Users
{
    private $db;
    private $table = "Users";

    public function __construct()
    {
        $this->db = new DB();
    }

    public function getAllUsers()
    {
        
        return $this->db->connect()->get($this->table);
    }


    /**
     * insert new product in db
     * @param array $data => fileds and values of product row 
     */
    public function insertUsers($data)
    {
        return $this->db->connect()->insert($this->table,$data);
    }


    /**
     * delete product from db 
     * @param int $id => id of product 
     */
    public function deleteUser($id)
    {
        $delete = $this->db->connect()->where('id',$id);
        return $delete->delete($this->table);
    }


    /**
     * get data of product from database
     * @param int $id 
     * @return array 
     */

    public function getUser($id)
    {
        $product = $this->db->connect()->where('id', $id);
        return $product->get($this->table);
    }

    public function updateUser($id,$data)
    {
        $product = $this->db->connect()->where('id', $id);
        return $product->update($this->table,$data);
    }

    public function searchUsers($searchQuery)
    {
        $searchQuery = '%' . $searchQuery . '%';
        $this->db->connect()->where('id', $searchQuery, 'LIKE');
        $this->db->connect()->orWhere('name', $searchQuery, 'LIKE');
        $this->db->connect()->orWhere('position', $searchQuery, 'LIKE');
        $this->db->connect()->orWhere('department', $searchQuery, 'LIKE');
        $this->db->connect()->orWhere('phone_number', $searchQuery, 'LIKE');
        $this->db->connect()->orWhere('start_date', $searchQuery, 'LIKE');
        $this->db->connect()->orWhere('end_date', $searchQuery, 'LIKE');
        $this->db->connect()->orWhere('status', $searchQuery, 'LIKE');
        return $this->db->get($this->table);
    }
   
}