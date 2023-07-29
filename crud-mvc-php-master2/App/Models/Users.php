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
        
        return $this->db->select($this->table);
    }


    /**
     * insert new product in db
     * @param array $data => fileds and values of product row 
     */
    public function insertUsers($data)
    {
        return $this->db->insert($this->table,$data);
    }


    /**
     * delete product from db 
     * @param int $id => id of product 
     */
    public function deleteUser($id)
    {
        return $this->db->delete($this->table,$id);
    }


    /**
     * get data of product from database
     * @param int $id 
     * @return array 
     */

    public function getUser($id)
    {
        return $this->db->selectById($this->table,$id);
    }

    public function updateUser($id,$data)
    {
        return $this->db->update($this->table,$id,$data);
    }

    public function searchUsers($searchQuery)
    {
        $searchQuery = '%' . $searchQuery . '%';

        $query = "SELECT * FROM `{$this->table}` WHERE `name` LIKE '{$searchQuery}' OR `position` LIKE '{$searchQuery}' OR `department` LIKE '{$searchQuery}'OR `phone_number` LIKE '{$searchQuery}'OR `start_date` LIKE '{$searchQuery}'OR `end_date` LIKE '{$searchQuery}'OR `status` LIKE '{$searchQuery}'";
        
        return $this->db->rawQuery($query);
       
    }
   
}