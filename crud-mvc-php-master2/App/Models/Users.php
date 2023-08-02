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


    public function getStatusStatistics()
    {
        $totalUsersQuery = "SELECT COUNT(*) AS total_users FROM `{$this->table}`";

        $totalUsersResult = $this->db->rawQuery($totalUsersQuery);
        $totalUsers = $totalUsersResult[0]['total_users'];
    
        $endDateQuery = "SELECT COUNT(*) AS endDateCount FROM `{$this->table}` WHERE `end_date` < CURDATE()";
        $endDateResult = $this->db->rawQuery($endDateQuery);
        $endDateCount = $endDateResult[0]['endDateCount'];

        $startDateCount = $totalUsers - $endDateCount;
    
        $endDatePercentage = ($totalUsers > 0) ? ($endDateCount / $totalUsers) * 100 : 0;
        $formatEndDatePercentage = number_format($endDatePercentage, 0);

        $allUsersStartDateQuery = "SELECT * FROM `{$this->table}` WHERE `start_date` < CURDATE()";
        $allUsersStartDateResult = $this->db->rawQuery($allUsersStartDateQuery);
       

        $allUsersEndDateQuery = "SELECT * FROM `{$this->table}` WHERE `end_date` > CURDATE()";
        $allUsersEndDateResult = $this->db->rawQuery($allUsersEndDateQuery);
       


        
        return [
            'startDateCount' => $startDateCount,
            'endDateCount' => $endDateCount,
            'endDatePercentage' => $formatEndDatePercentage,
            'allUsersStartDateResult' => $allUsersStartDateResult,
            'allUsersEndDateResult' => $allUsersEndDateResult,
        ];
    }
    
    
    public function searchUsers($searchQuery)
    {
        $searchQuery = '%' . $searchQuery . '%';
    
        $query = "SELECT * FROM `{$this->table}` WHERE `name` LIKE '{$searchQuery}' OR `company` LIKE '{$searchQuery}' OR `ssn` LIKE '{$searchQuery}' OR `start_date` LIKE '{$searchQuery}' OR `end_date` LIKE '{$searchQuery}' OR `religion` LIKE '{$searchQuery}' OR `phone_number` LIKE '{$searchQuery}'  OR `administrator_phone` LIKE '{$searchQuery}' ";

        return $this->db->rawQuery($query);
    }

    
    public function searchByNationality($nationality){
        $nationality = strtolower($nationality);
        $query = "SELECT * FROM `{$this->table}` WHERE LOWER(`nationality`) = '{$nationality}'";
        return $this->db->rawQuery($query);
    }
    
 

}