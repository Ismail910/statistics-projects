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
        if(isset($_POST['submit']))
        {
            $name = $_POST['name'];
            $position = $_POST['position'];
            $phone_number = $_POST['phone_number'];
            $department = $_POST['department'];
            $start_date = $_POST['start_date'];
            $end_date = $_POST['end_date'];
            $status = $_POST['status'];

            $this->conn = new Users();
            $dataInsert = Array ( "name" => $name ,
                            "position" => $position ,
                            "phone_number" => $phone_number ,
                            "department" => $department , 
                            "start_date" => $start_date , 
                            "end_date" => $end_date , 
                            "status" => $status , 
                            );

            if($this->conn->insertUsers($dataInsert))
            {
                $data['success'] = "Data Added Successfully";
                return $this->view('users/add',$data);
            }
            else 
            {
                $data['error'] = "Error";
                return $this->view('users/add',$data);
            }
        }
        return $this->view('users/add');
    }




    public function edit($id)
    {
        // var_dump($this->conn->getUser($id));
        $data['row'] = $this->conn->getUser($id)[0];
        return $this->view('users/edit',$data);
    }

    public function update()
    {
        if(isset($_POST['submit']))
        {
            $name = $_POST['name'];
            $position = $_POST['position'];
            $phone_number = $_POST['phone_number'];
            $department = $_POST['department'];
            $start_date = $_POST['start_date'];
            $end_date = $_POST['end_date'];
            $status = $_POST['status'];
            $id = $_POST['id'];

            $this->conn = new Users();
            $dataInsert = Array ( "name" => $name ,
                            "position" => $position ,
                            "phone_number" => $phone_number ,
                            "department" => $department ,
                            "start_date" => $start_date ,
                            "end_date" => $end_date ,
                            "status" => $status ,
                            );
            
            

            if($this->conn->updateUser($id,$dataInsert))
            {
                $data['success'] = "Updated Successfully";
                $data['row'] = $this->conn->getUser($id)[0];
                $this->view('users/edit',$data);
            }
            else 
            {
                $data['error'] = "Error";
                $data['row'] = $this->conn->getUser($id)[0];
                return $this->view('users/edit',$data);
            }
        }
        redirect('home/index');
    }



    
    public function delete($id)
    {
        if($this->conn->deleteUser($id))
        {
            $data['success'] = "users Have Been Deleted";
            return $this->view('users/delete',$data);
        }
        else 
        {
            $data['error'] = "Error";
            return $this->view('users/delete',$data);
        }
    }
}