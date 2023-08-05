<?php 



class UsersController extends Controller 
{
    private $conn;

    public function __construct()
    {
        $this->conn = new Users();
    }


    public function index()
    {
        $data['users'] = $this->conn->getAllUsers();
        return $this->view('users/index',$data);
    }





    public function add()
    {
        return $this->view('users/add');
    }

    public function store()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // ... (Existing code to handle form data)
            $name = $_POST['name'];
            $position = $_POST['position'];
            $Job_ID = $_POST['Job_ID'];
            $department = $_POST['department'];
            $start_date = $_POST['start_date'];
            $end_date = $_POST['end_date'];
            $status = $_POST['status'];   
            $reasonOFRequest = $_POST['reasonOFRequest'];    
            // Handle the file upload
            if (isset($_FILES['profile_picture']) && $_FILES['profile_picture']['error'] === UPLOAD_ERR_OK) {
                $file_tmp = $_FILES['profile_picture']['tmp_name'];
                $profile_picture = file_get_contents($file_tmp); // Read the binary data of the image
            }
                // Prepare the data to be inserted into the database
                $dataInsert = [
                    "name" => $name,
                    "position" => $position,
                    "Job_ID" => $Job_ID,
                    "department" => $department, 
                    "start_date" => $start_date, 
                    "end_date" => $end_date, 
                    "status" => $status, 
                    "reasonOFRequest" => $reasonOFRequest
                ];
                if (isset($profile_picture)) {
                    $dataInsert['profile_picture'] = $profile_picture;
                }
        
    
                $this->conn = new Users();
    
                if ($this->conn->insertUsers($dataInsert)) {
                    $data['success'] = "Data Added Successfully";
                    return $this->view('users/add', $data);
                } else {
                    $data['error'] = "Error";
                    return $this->view('users/add', $data);
                }
            
        }
    
        $data['users'] = $this->conn->getAllUsers();
        return $this->view('users/index', $data);
    }
    



    public function edit($id)
    {
        // var_dump($this->conn->getUser($id));
        $data['row'] = $this->conn->getUser($id);
        return $this->view('users/edit',$data);
    }

    public function update()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_POST['id'];
            $name = $_POST['name'];
            $position = $_POST['position'];
            $Job_ID = $_POST['Job_ID'];
            $department = $_POST['department'];
            $start_date = $_POST['start_date'];
            $end_date = $_POST['end_date'];
            $status = $_POST['status'];
            $reasonOFRequest = $_POST['reasonOFRequest'];
    
            $this->conn = new Users();
    
            // Handle the file upload (if a new photo is provided)
            if (isset($_FILES['profile_picture']) && $_FILES['profile_picture']['error'] === UPLOAD_ERR_OK) {
                $file_tmp = $_FILES['profile_picture']['tmp_name'];
                $profile_picture = file_get_contents($file_tmp); // Read the binary data of the image
            }
    
            // Prepare the data to be updated in the database
            $dataInsert = [
                "name" => $name,
                "position" => $position,
                "Job_ID" => $Job_ID,
                "department" => $department, 
                "start_date" => $start_date, 
                "end_date" => $end_date, 
                "status" => $status, 
                "reasonOFRequest" => $reasonOFRequest,
            ];
    
            // If a new photo is provided, add it to the data array
            if (isset($profile_picture)) {
                $dataInsert['profile_picture'] = $profile_picture;
            }
    
            if ($this->conn->updateUser($id, $dataInsert)) {
                $data['success'] = "Updated Successfully";
                $data['row'] = $this->conn->getUser($id);
                $data['users'] = $this->conn->getAllUsers();
                return $this->view('users/index', $data);
            } else {
                $data['error'] = "Error";
                $data['row'] = $this->conn->getUser($id)[0];
                return $this->view('users/edit', $data);
            }
        }
    
        redirect('home/index');
    }
    



    
    public function delete($id)
    {
        if($this->conn->deleteUser($id))
        {
            $data['success'] = "users Have Been Deleted";
            $data['users'] = $this->conn->getAllUsers();
            return $this->view('users/index',$data);
           
        }
        else 
        {
            $data['error'] = "Error";
            $data['users'] = $this->conn->getAllUsers();
            return $this->view('users/index',$data);
        }
    }

    public function search()
    {
        if ($_POST['query']==""){
            $data['users'] = $this->conn->getAllUsers();
            return $this->view('users/index',$data);
        }else{
            $searchQuery = $_POST['query'];
            $usersModel = new Users();
            $data['searchResults'] = $usersModel->searchUsers($searchQuery);
            $data['statisticsResults'] = $this->calculateResultStatistics($data['searchResults']);
            return $this->view('users/search', $data);
        }
    }


    private function calculateResultStatistics($results)
    {
        $totalUsers = count($results);
        $passCount = 0;
        $notPassCount = 0;
    
        foreach ($results as $user) {
            if ($user['status'] == 'pass') {
                $passCount++;
            }
            if ($user['status'] == 'not pass') {
                $notPassCount++;
            }
        }
    
        $passPercentage = ($totalUsers > 0) ? ($passCount / $totalUsers) * 100 : 0;
        $notPassPercentage = 100 - $passPercentage;
    
        // Format the percentage values to show only the integer part (without decimals)
        $passPercentageFormatted = number_format($passPercentage, 0);
        $notPassPercentageFormatted = number_format($notPassPercentage, 0);
    
        return [
            'pass_count' => $passCount,
            'not_pass_count' => $notPassCount,
            'pass_percentage' => $passPercentageFormatted . '%',
            'not_pass_percentage' => $notPassPercentageFormatted . '%',
        ];
    }
    

   
} 