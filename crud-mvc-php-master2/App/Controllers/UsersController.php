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
            $id_number = $_POST['id_number'];
            $nationality = $_POST['nationality'];
           
            $company = $_POST['company'];
            $start_date = $_POST['start_date'];
            $end_date = $_POST['end_date'];

            $this->conn = new Users();
            $dataInsert = array(
                "name" => $name,
                "id_number" => $id_number,
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
            $id_number = $_POST['id_number'];
            $company = $_POST['company'];
            $start_date = $_POST['start_date'];
            $end_date = $_POST['end_date'];
            $id = $_POST['id'];

            $this->conn = new Users();
            $dataInsert = array(
                "name" => $name,
                "nationality" => $nationality,
                "id_number" => $id_number,
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
            echo 'asdf';
            // return $this->view('users/search', $data);
        }
    }


}