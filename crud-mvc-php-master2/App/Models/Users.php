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
}