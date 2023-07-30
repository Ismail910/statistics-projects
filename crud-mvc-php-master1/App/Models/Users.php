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
        $passQuery = "SELECT COUNT(*) AS pass_count FROM `{$this->table}` WHERE `status` = 'pass'";
        $passResult = $this->db->rawQuery($passQuery);
        $passCount = $passResult[0]['pass_count'];
    
        $notPassQuery = "SELECT COUNT(*) AS not_pass_count FROM `{$this->table}` WHERE `status` = 'not pass'";
        $notPassResult = $this->db->rawQuery($notPassQuery);
        $notPassCount = $notPassResult[0]['not_pass_count'];
    
        $endDateQuery = "SELECT COUNT(*) AS end_date_count FROM `{$this->table}` WHERE `end_date` < CURDATE()";
        $endDateResult = $this->db->rawQuery($endDateQuery);
        $endDateCount = $endDateResult[0]['end_date_count'];
    
        $totalUsers = $passCount + $notPassCount;
        $endDatePercentage = ($totalUsers > 0) ? ($endDateCount / $totalUsers) * 100 : 0;
        $passPercentage = ($totalUsers > 0) ? ($passCount / $totalUsers) * 100 : 0;
        $notPassPercentage = 100 - $passPercentage;
    
       
        $PassUsersQuery = "SELECT * FROM `{$this->table}` WHERE `status` = 'pass'";
        $PassUsersResult = $this->db->rawQuery($PassUsersQuery);

        $notPassUsersQuery = "SELECT * FROM `{$this->table}` WHERE `status` = 'not pass'";
        $notPassUsersResult = $this->db->rawQuery($notPassUsersQuery);

        $allUsersQuery = "SELECT * FROM `{$this->table}` WHERE `end_date` < CURDATE()";
        $allUsersResult = $this->db->rawQuery($allUsersQuery);
    
        return [
            'pass_count' => $passCount,
            'not_pass_count' => $notPassCount,
            'end_Date_Count' => $endDateCount,
            'pass_percentage' => $passPercentage,
            'not_pass_percentage' => $notPassPercentage,
            'end_Date_Percentage' => $endDatePercentage,
            'pass_users' => $PassUsersResult,
            'not_pass_users' => $notPassUsersResult,
            'all_users_with_end_date_past' => $allUsersResult
        ];
    }
    
    

    public function searchUsers($searchQuery)
    {
        $searchQuery = '%' . $searchQuery . '%';

        $query = "SELECT * FROM `{$this->table}` WHERE `name` LIKE '{$searchQuery}' OR `position` LIKE '{$searchQuery}' OR `department` LIKE '{$searchQuery}'OR `phone_number` LIKE '{$searchQuery}'OR `start_date` LIKE '{$searchQuery}'OR `end_date` LIKE '{$searchQuery}'OR `status` LIKE '{$searchQuery}'";
        
        return $this->db->rawQuery($query);
       
    }
   






}