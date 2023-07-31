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
        return $this->view('users/index', $data);
    }


    public function add()
    {
        return $this->view('users/add');
    }

    public function store()
    {
        if (isset($_POST['submit'])) {
            $name = $_POST['name'];
            $ssn = $_POST['ssn'];
            $nationality = $_POST['nationality'];
           
            $company = $_POST['company'];
            $start_date = $_POST['start_date'];
            $end_date = $_POST['end_date'];

            $this->conn = new Users();
            $dataInsert = array(
                "name" => $name,
                "ssn" => $ssn,
                "nationality" => $nationality,
               
                "company" => $company,
                "start_date" => $start_date,
                "end_date" => $end_date,

            );

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
       
        $data['row'] = $this->conn->getUser($id);
        return $this->view('users/edit', $data);
    }

    public function update()
    {
        if (isset($_POST['submit'])) {
            $name = $_POST['name'];
            $nationality = $_POST['nationality'];
            $ssn = $_POST['ssn'];
            $company = $_POST['company'];
            $start_date = $_POST['start_date'];
            $end_date = $_POST['end_date'];
            $id = $_POST['id'];

            $this->conn = new Users();
            $dataInsert = array(
                "name" => $name,
                "nationality" => $nationality,
                "ssn" => $ssn,
                "company" => $company,
                "start_date" => $start_date,
                "end_date" => $end_date,

            );



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
        if ($this->conn->deleteUser($id)) {
            $data['success'] = "users Have Been Deleted";
            $data['users'] = $this->conn->getAllUsers();
            return $this->view('users/index', $data);

        } else {
            $data['error'] = "Error";
            $data['users'] = $this->conn->getAllUsers();
            return $this->view('users/index', $data);
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
            
            return $this->view('users/search', $data);
        }
    }
    
    public function searchByCountry()
    {
       if ($_POST['query']==""){
            $data['users'] = $this->conn->getAllUsers();
            return $this->view('users/index',$data);
        }else{

            $searchQuery = $_POST['query'];
            $usersModel = new Users();
            $data['searchResults'] = $usersModel->searchByNationality($searchQuery);
            $data['statisticsResults'] = $this->calculateResultStatistics($data['searchResults']);
            $data['countryName']= $_POST['query'];
            return $this->view('users/searchCountry', $data);
        }
    }


    private function calculateResultStatistics($results){

        $totalUsers =  count($this->conn->getAllUsers());

        $totalUsersOfCountry = count($results);

        $countryPercentage = ($totalUsers > 0) ? ($totalUsersOfCountry / $totalUsers) * 100 : 0;

        $countryPercentageFormatted = number_format($countryPercentage, 0);

        return [
            'country_percentage' => $countryPercentageFormatted . '%',
        ];

    }

    

}